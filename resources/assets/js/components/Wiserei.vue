<template>
    <div>
        <el-table
                v-loading="loading"
                v-infinite-scroll="fetchRecords"
                infinite-scroll-disabled="loading"
                infinite-scroll-immediate="false"
                :data="records"
                :default-sort="{prop: 'Wiserei Score', order: 'descending'}"
                style="width: 100%; height: 90vh; overflow-y: auto;"
                :max-height="window.height"
                border
        >
            <el-table-column resizeable sortable width="150" fixed prop="City" label="City"></el-table-column>
            <el-table-column resizeable sortable width="150" prop="State" label="State"></el-table-column>
            <el-table-column resizeable sortable width="150" prop="Wiserei Score"
                             label="Wiserei Score"></el-table-column>
            <el-table-column resizeable sortable width="150" prop="Wiserei Grade"
                             label="Wiserei Grade"></el-table-column>
            <el-table-column resizeable sortable width="150" prop="Recent Population"
                             label="Recent Population"></el-table-column>
            <el-table-column resizeable sortable width="150" prop="Recent Population Year"
                             label="Recent Population Year"></el-table-column>
            <el-table-column resizeable sortable width="150" prop="Population Growth"
                             label="Population Growth"></el-table-column>
            <el-table-column resizeable sortable width="150" prop="Population Growth Grade"
                             label="Population Growth Grade"></el-table-column>
            <el-table-column resizeable sortable width="150" prop="Median Household Income 2016"
                             label="Median Household Income 2016"></el-table-column>
            <el-table-column resizeable sortable width="150" prop="Median Household Income 2000"
                             label="Median Household Income 2000"></el-table-column>
            <el-table-column resizeable sortable width="150" prop="Income Growth"
                             label="Income Growth"></el-table-column>
            <el-table-column resizeable sortable width="150" prop="Income Growth Grade"
                             label="Income Growth Grade"></el-table-column>
            <el-table-column resizeable sortable width="150" prop="Median House Value 2016"
                             label="Median House Value 2016"></el-table-column>
            <el-table-column resizeable sortable width="150" prop="Median House Value 2000"
                             label="Median House Value 2000"></el-table-column>
            <el-table-column resizeable sortable width="150" prop="House Value Growth"
                             label="House Value Growth"></el-table-column>
            <el-table-column resizeable sortable width="150" prop="House Value Growth Grade"
                             label="House Value Growth Grade"></el-table-column>
            <el-table-column resizeable sortable width="150" prop="Crime Level Grade"
                             label="Crime Level Grade"></el-table-column>
            <el-table-column resizeable sortable width="150" prop="Crime Change" label="Crime Change"></el-table-column>
            <el-table-column resizeable sortable width="150" prop="Crime Change Grade"
                             label="Crime Change Grade"></el-table-column>

            <div slot="append" v-loading="loadingRecords" v-text="loadingRecordsText"></div>
        </el-table>
    </div>
</template>

<script>
    const Airtable = require('airtable')

    export default {
        name: 'Wiserei',
        props: [
            'airtable_api_key',
            'airtable_wiserei_base'
        ],
        data() {
            return {
                airtable: null,
                fetches: 3,
                loading: true,
                loadingRecords: false,
                loadingRecordsText: 'Loading...',
                records: [],
                wait: true,
                window: {
                    height: 0,
                    width: 0
                }
            }
        },
        watch: {
            records() {
                if (this.records) {
                    this.loading = false
                }
            }
        },
        methods: {
            fetchRecords() {
                window.events.$emit('fetchRecords')
            },
            handleResize() {
                this.window.height = window.innerHeight
                this.window.width = window.innerWidth
            }
        },
        created() {
            this.airtable = new Airtable({apiKey: this.airtable_api_key}).base(this.airtable_wiserei_base)
            window.addEventListener('resize', this.handleResize)
            this.handleResize()
            this.airtable('Data by City').select({
                pageSize: 20,
                view: "Grid view"
            }).eachPage((records, fetchNextPage) => {
                this.records = this.records.concat(records.forEach((record) => {
                    if (record['fields']) {
                        this.records.push(record['fields'])
                    }
                }))
                this.loadingRecords = false

                window.events.$on('fetchRecords', () => {
                    this.loadingRecords = true
                    fetchNextPage()
                })
            }, function done(err) {
                if (err) console.error(err)
                this.loadingRecords = true
                this.loadingRecordsText = 'No more.'
            })

        },
        destroyed() {
            window.removeEventListener('resize', this.handleResize)
        }
    }
</script>
