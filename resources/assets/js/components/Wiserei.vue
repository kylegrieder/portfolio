<template>
    <div>
        <div class="container-fluid">
            <div class="navbar navbar-light bg-white mb-3 mt-2">
                <span class="d-flex align-items-center navbar-brand font-weight-bold" text="Wiserei">
                    <b-img slot="button-content" class="wiserei-logo" src="/images/wiserei-logo-medium.png"></b-img>
                    <div class="col-12">
                        <b-input
                                class="ml-4"
                                placeholder="Search..."
                        >
                        </b-input>
                    </div>
                </span>
                <span class="nav-item mr-2">
                <b-img slot="button-content" class="wiserei-icon" src="/images/material-dashboard.svg"></b-img>
                <b-img slot="button-content" class="ml-2 wiserei-icon"
                       src="/images/material-account_circle.svg"></b-img>
            </span>
            </div>
            <div v-if="!searching" id="data-by-city-landing" class="data-by-city-landing">
                <b-jumbotron class="bg-white mt-5">
                    <div slot="header" class="display-4 text-lg-center text-left">
                        Are you ready to make your next big property investment?
                    </div>
                    <div slot="lead">
                        We have the tools to help you find the best properties, in the best neighborhoods, in the best
                        cities. Start your search <span class="font-weight-bold">now</span>.
                    </div>
                    <hr class="my-4">

                    <div class="d-flex justify-content-center">
                        <b-dropdown size="lg" variant="wiserei" text="State"></b-dropdown>
                    </div>
                </b-jumbotron>
            </div>
            <div v-show="searching" id="data-by-city-search" class="data-by-city-search">
                <div class="data-by-city-backdrop"></div>
                <div class="data-by-city-search">
                    <div class="row">
                        <div class="col-2">
                            <b-dropdown class="w-100 font-weight-bold" variant="wiserei" text="Data By City">
                                <b-dropdown-item h-ref="/wiserei">Data By City</b-dropdown-item>
                                <b-dropdown-item h-ref="/">Other Data</b-dropdown-item>
                            </b-dropdown>
                        </div>
                        <div class="col-10">

                            <el-table
                                    border
                                    style="width: 100%; height: 90vh;"
                                    v-loading="initialLoad"
                                    :data="records"
                                    :default-sort="{prop: 'Wiserei Score', order: 'descending'}"
                                    :height="window.height - 100"
                                    :header-row-style="getHeaderStyle"
                            >
                                <el-table-column
                                        fixed
                                        resizeable
                                        sortable
                                        width="120"
                                        prop="City"
                                        label="City"
                                        :filters="filters['city']"
                                        :filter-method="handleFilter"
                                >
                                </el-table-column>
                                <el-table-column
                                        resizeable
                                        sortable
                                        width="120"
                                        prop="State"
                                        label="State"
                                        :filters="filters['state']"
                                        :filter-method="handleFilter"
                                >
                                </el-table-column>
                                <el-table-column
                                        resizeable
                                        sortable
                                        width="170"
                                        prop="Wiserei Score"
                                        label="Wiserei Score"
                                        :filters="filters['wisereiScore']"
                                        :filter-method="handleFilter"
                                >
                                </el-table-column>
                                <el-table-column
                                        resizeable
                                        sortable
                                        width="170"
                                        prop="Wiserei Grade"
                                        label="Wiserei Grade"
                                        :filters="filters['wisereiGrade']"
                                        :filter-method="handleFilter"
                                >
                                </el-table-column>
                                <el-table-column
                                        resizeable
                                        sortable
                                        width="180"
                                        prop="Population 2000"
                                        label="Population 2000"
                                        :filters="filters['population2000']"
                                        :filter-method="handleFilter"
                                >
                                </el-table-column>
                                <el-table-column
                                        resizeable
                                        sortable
                                        width="180"
                                        prop="Population 2010"
                                        label="Population 2010"
                                        :filters="filters['population2010']"
                                        :filter-method="handleFilter"
                                >
                                </el-table-column>
                                <el-table-column
                                        resizeable
                                        sortable
                                        width="190"
                                        prop="Recent Population"
                                        label="Recent Population"
                                        :filters="filters['recentPopulation']"
                                        :filter-method="handleFilter"
                                >
                                </el-table-column>
                                <el-table-column
                                        resizeable
                                        sortable
                                        width="220"
                                        prop="Recent Population Year"
                                        label="Recent Population Year"
                                        :filters="filters['recentPopulationYear']"
                                        :filter-method="handleFilter"
                                >
                                </el-table-column>
                                <el-table-column
                                        resizeable
                                        sortable
                                        width="190"
                                        prop="Population Growth"
                                        label="Population Growth"
                                        :filters="filters['populationGrowth']"
                                        :filter-method="handleFilter"
                                >
                                </el-table-column>
                                <el-table-column
                                        resizeable
                                        sortable
                                        width="240"
                                        prop="Population Growth Grade"
                                        label="Population Growth Grade"
                                        :filters="filters['populationGrowthGrade']"
                                        :filter-method="handleFilter"
                                >
                                </el-table-column>
                                <el-table-column
                                        resizeable
                                        sortable
                                        width="290"
                                        prop="Median Household Income 2016"
                                        label="Median Household Income 2016"
                                        :filters="filters['medianHouseholdIncome2016']"
                                        :filter-method="handleFilter"
                                >
                                </el-table-column>
                                <el-table-column
                                        resizeable
                                        sortable
                                        width="290"
                                        prop="Median Household Income 2000"
                                        label="Median Household Income 2000"
                                        :filters="filters['medianHouseholdIncome2000']"
                                        :filter-method="handleFilter"
                                >
                                </el-table-column>
                                <el-table-column
                                        resizeable
                                        sortable
                                        width="170"
                                        prop="Income Growth"
                                        label="Income Growth"
                                        :filters="filters['incomeGrowth']"
                                        :filter-method="handleFilter"
                                >
                                </el-table-column>
                                <el-table-column
                                        resizeable
                                        sortable
                                        width="210"
                                        prop="Income Growth Grade"
                                        label="Income Growth Grade"
                                        :filters="filters['incomeGrowthGrade']"
                                        :filter-method="handleFilter"
                                >
                                </el-table-column>
                                <el-table-column
                                        resizeable
                                        sortable
                                        width="250"
                                        prop="Median House Value 2016"
                                        label="Median House Value 2016"
                                        :filters="filters['medianHouseValue2016']"
                                        :filter-method="handleFilter"
                                >
                                </el-table-column>
                                <el-table-column
                                        resizeable
                                        sortable
                                        width="250"
                                        prop="Median House Value 2000"
                                        label="Median House Value 2000"
                                        :filters="filters['medianHouseValue2000']"
                                        :filter-method="handleFilter"
                                >
                                </el-table-column>
                                <el-table-column
                                        resizeable
                                        sortable
                                        width="210"
                                        prop="House Value Growth"
                                        label="House Value Growth"
                                        :filters="filters['houseValueGrowth']"
                                        :filter-method="handleFilter"
                                >
                                </el-table-column>
                                <el-table-column
                                        resizeable
                                        sortable
                                        width="250"
                                        prop="House Value Growth Grade"
                                        label="House Value Growth Grade"
                                        :filters="filters['houseValueGrowthGrade']"
                                        :filter-method="handleFilter"
                                >
                                </el-table-column>
                                <el-table-column
                                        resizeable
                                        sortable
                                        width="190"
                                        prop="Crime Level Grade"
                                        label="Crime Level Grade"
                                        :filters="filters['crimeLevelGrade']"
                                        :filter-method="handleFilter"
                                >
                                </el-table-column>
                                <el-table-column
                                        resizeable
                                        sortable
                                        width="170"
                                        prop="Crime Change"
                                        label="Crime Change"
                                        :filters="filters['crimeChange']"
                                        :filter-method="handleFilter"
                                >
                                </el-table-column>
                                <el-table-column
                                        resizeable
                                        sortable
                                        width="210"
                                        prop="Crime Change Grade"
                                        label="Crime Change Grade"
                                        :filters="filters['crimeChangeGrade']"
                                        :filter-method="handleFilter"
                                >
                                </el-table-column>

                                <infinite-loading
                                        slot="append"
                                        :distance="1"
                                        @infinite="fetchRecords"
                                        spinner="spiral"
                                        force-use-infinite-wrapper=".el-table__body-wrapper"
                                >
                                </infinite-loading>
                            </el-table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            Wiserei™. Copyright 2019. All rights reserved. Click <a href="#">here</a> to view our privacy policy.
        </div>
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
                filters: {},
                initialLoad: true,
                loadingRecords: false,
                records: [],
                searching: false,
                wait: true,
                window: {
                    height: 0,
                    width: 0
                }
            }
        },
        methods: {
            fetchRecords(event) {
                window.events.$emit('fetchRecords', event)
                window.events.$on('fetchedRecords', () => {
                    event.loaded()
                })
                window.events.$on('allRecordsFetched', () => {
                    event.complete()
                })
            },
            getHeaderStyle() {
                return 'color: #1FA9FF;'
            },
            handleResize() {
                this.window.height = window.innerHeight
                this.window.width = window.innerWidth
            },
            handleFilter(value, row, column) {
                const property = column['property']
                return row[property] === value
            }
        },
        created() {
            this.airtable = new Airtable({apiKey: this.airtable_api_key}).base(this.airtable_wiserei_base)

            window.addEventListener('resize', this.handleResize)
            this.handleResize()
        },
        mounted() {
            this.airtable('Data by City').select({
                pageSize: 20,
                view: "Grid view",
                sort: [{field: 'Wiserei Grade', direction: 'asc'}, {field: 'Wiserei Score', direction: 'desc'}]
            }).eachPage((records, fetchNextPage) => {
                this.initialLoad = false

                records.forEach((record) => {
                    this.records.push(record['fields'])
                    Object.entries(record['fields']).forEach(([key, value]) => {
                        const camelKey = _.camelCase(key)

                        if (!this.filters.hasOwnProperty(camelKey)) {
                            this.filters[camelKey] = []
                        }

                        const filterValues = this.filters[camelKey].map(filter => filter.value)
                        if (!filterValues.includes(value)) {
                            this.filters[camelKey].push({text: value, value: value})
                            this.filters[camelKey] = _.sortBy(this.filters[camelKey], (filter) => {
                                return filter.value
                            })
                        }
                    })
                })

                this.loadingRecords = false
                window.events.$emit('fetchedRecords')
                window.events.$on('fetchRecords', () => {
                    if (!this.loadingRecords) {
                        this.loadingRecords = true
                        fetchNextPage()
                    }
                })
            }, function done(err) {
                if (err) console.error(err)
                this.loadingRecordsText = 'No more.'
                window.events.$emit('allRecordsFetched')
            })
        },
        destroyed() {
            window.removeEventListener('resize', this.handleResize)
        }
    }
</script>
