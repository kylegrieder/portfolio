<template>
    <div>
        <div class="container-fluid bg-transparent">
            <div :class="wisereiBackground">
                <div class="navbar navbar-light bg-white mb-3 mt-2">
                    <span class="d-flex align-items-center navbar-brand" text="Wiserei">
                        <b-img @click="searching = !searching"slot="button-content" class="wiserei-logo cursor-pointer"
                               src="/images/wiserei-logo-medium.png"></b-img>
                        <div v-if="!searching" class="mt-3 ml-4">
                            Search By:
                            <a class="col text-wiserei"><u>City</u></a> |
                            <a class="col">Price</a> |
                            <a class="col">Forecast</a>
                        </div>
                        <div v-if="searching" id="data-type-dropdown" class="mt-3 ml-4">
                            <b-dropdown class="w-100 font-weight-bold mb-2" variant="wiserei"
                                        text="Data By City">
                                <b-dropdown-item h-ref="/wiserei">Data By City</b-dropdown-item>
                                <b-dropdown-item h-ref="/">Data by Price</b-dropdown-item>
                                <b-dropdown-item h-ref="/">Data by Forecast</b-dropdown-item>
                            </b-dropdown>
                        </div>
                    </span>
                    <span class="nav-item mr-2">
                            <span class="text-wiserei font-weight-bold">Login</span>
                        </span>
                </div>
                <div v-if="!searching" id="data-by-city-landing" class="data-by-city-landing bg-transparent">
                    <b-jumbotron class="bg-white mt-5 mx-n1">
                        <div slot="header" class="display-4 text-lg-center text-left">
                            Are you ready to make your next big property investment?
                        </div>
                        <div slot="lead" class="text-center">
                            We have the tools to help you find the <span class="font-weight-bold">best</span> properties, in
                            the <span class="font-weight-bold">best</span> neighborhoods, in the
                            <span class="font-weight-bold">best</span>
                            cities. Start your search <span class="font-weight-bold"><u>now</u></span>.
                        </div>
                        <hr class="my-4">

                        <div class="d-flex align-items-center justify-content-center">
                            <b-dropdown menu-class="scrollable-dropdown" size="lg" variant="wiserei"
                                        :text="searchFilters.states.length ? searchFilters.states[0] : 'State'">
                                <b-dropdown-item @click="addState(state)" :key="index" v-for="(state, index) in states">{{
                                    state.text }}
                                </b-dropdown-item>
                            </b-dropdown>
                            <div class="col-3">
                                <b-input @keyup.enter="search" size="lg" v-model="searchCity"
                                         placeholder="Enter a city..."></b-input>
                            </div>

                            <b-btn @click="search" size="lg" variant="wiserei">Search</b-btn>
                        </div>
                    </b-jumbotron>
                </div>
                <div v-show="searching" id="data-by-city-search" class="data-by-city-search">
                    <div class="data-by-city-backdrop"></div>
                    <div class="data-by-city-search mx-3">
                        <div class="row">
                            <div class="col-2">
                                <div class="rounded bg-white text-muted font-weight-bold mb-2">
                                    <h4 class="ml-3 py-2">
                                        Refine Your Search:
                                    </h4>
                                </div>
                                <div id="filter-dropdowns" class="filter-dropdowns mt-1" style="max-height: calc(80vh - 100px); overflow-x: auto;">
                                    <hr>

                                    <b-input-group class="mt-2">
                                        <b-input placeholder="City" v-model="searchCity"></b-input>
                                    </b-input-group>

                                    <b-dropdown class="mt-2" variant="light" text="States">
                                        <b-dropdown-form>
                                            <b-form-checkbox-group
                                                stacked
                                                id="states-checkbox-group"
                                                v-model="searchFilters.states"
                                                :options="states"
                                            >
                                            </b-form-checkbox-group>
                                        </b-dropdown-form>
                                    </b-dropdown>

                                    <hr>

                                    <!-- wiserei score/grade -->
                                    <b-input-group class="mt-2">
                                        <b-input placeholder="Wiserei Score" v-model="searchFilters.wisereiScore.value"></b-input>
                                        <b-dropdown class="filter-dropdown" slot="append" variant="wiserei" :text="searchFilters.wisereiScore.operator">
                                            <b-dropdown-item
                                                @click="searchFilters.wisereiScore.operator = operator"
                                                v-for="(operator, index) in operators"
                                                :key="index"
                                            >
                                                {{operator}}
                                            </b-dropdown-item>
                                        </b-dropdown>
                                    </b-input-group>


                                    <b-dropdown class="mt-2" variant="light" text="Wiserei Grade">
                                        <b-dropdown-form>
                                            <b-form-checkbox-group
                                                stacked
                                                id="wiserei-grade-checkbox-group"
                                                v-model="searchFilters.wisereiScore.grades"
                                                :options="letterGrades"
                                            >
                                            </b-form-checkbox-group>
                                        </b-dropdown-form>
                                    </b-dropdown>

                                    <hr>

                                    <!-- population growth -->
                                    <b-input-group class="mt-2">
                                        <b-input placeholder="Population Growth" v-model="searchFilters.populationGrowth.value"></b-input>
                                        <b-dropdown class="filter-dropdown" slot="append" variant="wiserei" :text="searchFilters.populationGrowth.operator">
                                            <b-dropdown-item
                                                    @click="searchFilters.populationGrowth.operator = operator"
                                                    v-for="(operator, index) in operators"
                                                    :key="index"
                                            >
                                                {{operator}}
                                            </b-dropdown-item>
                                        </b-dropdown>
                                    </b-input-group>


                                    <b-dropdown class="mt-2" variant="light" text="Population Growth Grade">
                                        <b-dropdown-form>
                                            <b-form-checkbox-group
                                                stacked
                                                id="population-growth-grade-checkbox-group"
                                                v-model="searchFilters.populationGrowth.grades"
                                                :options="letterGrades"
                                            >
                                            </b-form-checkbox-group>
                                        </b-dropdown-form>
                                    </b-dropdown>

                                    <hr>

                                    <!-- income growth -->
                                    <b-input-group class="mt-2">
                                        <b-input placeholder="Income Growth" v-model="searchFilters.incomeGrowth.value"></b-input>
                                        <b-dropdown class="filter-dropdown" slot="append" variant="wiserei" :text="searchFilters.incomeGrowth.operator">
                                            <b-dropdown-item
                                                    @click="searchFilters.incomeGrowth.operator = operator"
                                                    v-for="(operator, index) in operators"
                                                    :key="index"
                                            >
                                                {{operator}}
                                            </b-dropdown-item>
                                        </b-dropdown>
                                    </b-input-group>


                                    <b-dropdown class="mt-2" variant="light" text="Income Growth Grade">
                                        <b-dropdown-form>
                                            <b-form-checkbox-group
                                                stacked
                                                id="income-growth-grade-checkbox-group"
                                                v-model="searchFilters.incomeGrowth.grades"
                                                :options="letterGrades"
                                            >
                                            </b-form-checkbox-group>
                                        </b-dropdown-form>
                                    </b-dropdown>

                                    <hr>

                                    <!-- house value -->
                                    <b-input-group class="mt-2">
                                        <b-input placeholder="House Value" v-model="searchFilters.houseValue.value"></b-input>
                                        <b-dropdown class="filter-dropdown" slot="append" variant="wiserei" :text="searchFilters.houseValue.operator">
                                            <b-dropdown-item
                                                    @click="searchFilters.houseValue.operator = operator"
                                                    v-for="(operator, index) in operators"
                                                    :key="index"
                                            >
                                                {{operator}}
                                            </b-dropdown-item>
                                        </b-dropdown>
                                    </b-input-group>


                                    <b-dropdown class="mt-2" variant="light" text="House Value Grade">
                                        <b-dropdown-form>
                                            <b-form-checkbox-group
                                                stacked
                                                id="house-value-grade-checkbox-group"
                                                v-model="searchFilters.houseValue.grades"
                                                :options="letterGrades"
                                            >
                                            </b-form-checkbox-group>
                                        </b-dropdown-form>
                                    </b-dropdown>

                                    <hr>

                                    <!-- crime -->
                                    <b-dropdown class="mt-2" variant="light" text="Crime Level Grade">
                                        <b-dropdown-form>
                                            <b-form-checkbox-group
                                                    stacked
                                                    id="crimeChangeh-grade-checkbox-group"
                                                    v-model="searchFilters.crimeLevel.grades"
                                                    :options="letterGrades"
                                            >
                                            </b-form-checkbox-group>
                                        </b-dropdown-form>
                                    </b-dropdown>

                                    <b-input-group class="mt-2">
                                        <b-input placeholder="Crime Change" v-model="searchFilters.crimeChange.value"></b-input>
                                        <b-dropdown class="filter-dropdown" slot="append" variant="wiserei" :text="searchFilters.crimeChange.operator">
                                            <b-dropdown-item
                                                    @click="searchFilters.crimeChange.operator = operator"
                                                    v-for="(operator, index) in operators"
                                                    :key="index"
                                            >
                                                {{operator}}
                                            </b-dropdown-item>
                                        </b-dropdown>
                                    </b-input-group>

                                    <b-dropdown class="mt-2" variant="light" text="Crime Change Grade">
                                        <b-dropdown-form>
                                            <b-form-checkbox-group
                                                stacked
                                                id="crime-change-grade-checkbox-group"
                                                v-model="searchFilters.crimeChange.grades"
                                                :options="letterGrades"
                                            >
                                            </b-form-checkbox-group>
                                        </b-dropdown-form>
                                    </b-dropdown>

                                </div>
                                <div class="mt-2">
                                    <b-button @click="search" size="lg" variant="wiserei">Search</b-button>
                                </div>
                            </div>
                            <div class="col-10">
                                <el-table
                                        border
                                        style="width: 100%; height: 90vh;"
                                        v-loading="loading"
                                        :data="records"
                                        :default-sort="{prop: 'Wiserei Score', order: 'descending'}"
                                        :height="window.height - 130"
                                        :header-row-style="getHeaderStyle"
                                >
                                    <el-table-column
                                            fixed
                                            resizeable
                                            sortable
                                            width="120"
                                            prop="City"
                                            label="City"
                                            :filters="columnFilters['city']"
                                            :filter-method="handleFilter"
                                    >
                                    </el-table-column>
                                    <el-table-column
                                            resizeable
                                            sortable
                                            width="120"
                                            prop="State"
                                            label="State"
                                            :filters="columnFilters['state']"
                                            :filter-method="handleFilter"
                                    >
                                    </el-table-column>
                                    <el-table-column
                                            resizeable
                                            sortable
                                            width="170"
                                            prop="Wiserei Score"
                                            label="Wiserei Score"
                                            :filters="columnFilters['wisereiScore']"
                                            :filter-method="handleFilter"
                                    >
                                    </el-table-column>
                                    <el-table-column
                                            resizeable
                                            sortable
                                            width="170"
                                            prop="Wiserei Grade"
                                            label="Wiserei Grade"
                                            :filters="columnFilters['wisereiGrade']"
                                            :filter-method="handleFilter"
                                    >
                                    </el-table-column>
                                    <el-table-column
                                            resizeable
                                            sortable
                                            width="180"
                                            prop="Population 2000"
                                            label="Population 2000"
                                            :filters="columnFilters['population2000']"
                                            :filter-method="handleFilter"
                                    >
                                    </el-table-column>
                                    <el-table-column
                                            resizeable
                                            sortable
                                            width="180"
                                            prop="Population 2010"
                                            label="Population 2010"
                                            :filters="columnFilters['population2010']"
                                            :filter-method="handleFilter"
                                    >
                                    </el-table-column>
                                    <el-table-column
                                            resizeable
                                            sortable
                                            width="190"
                                            prop="Recent Population"
                                            label="Recent Population"
                                            :filters="columnFilters['recentPopulation']"
                                            :filter-method="handleFilter"
                                    >
                                    </el-table-column>
                                    <el-table-column
                                            resizeable
                                            sortable
                                            width="220"
                                            prop="Recent Population Year"
                                            label="Recent Population Year"
                                            :filters="columnFilters['recentPopulationYear']"
                                            :filter-method="handleFilter"
                                    >
                                    </el-table-column>
                                    <el-table-column
                                            resizeable
                                            sortable
                                            width="190"
                                            prop="Population Growth"
                                            label="Population Growth"
                                            :filters="columnFilters['populationGrowth']"
                                            :filter-method="handleFilter"
                                    >
                                    </el-table-column>
                                    <el-table-column
                                            resizeable
                                            sortable
                                            width="240"
                                            prop="Population Growth Grade"
                                            label="Population Growth Grade"
                                            :filters="columnFilters['populationGrowthGrade']"
                                            :filter-method="handleFilter"
                                    >
                                    </el-table-column>
                                    <el-table-column
                                            resizeable
                                            sortable
                                            width="290"
                                            prop="Median Household Income 2016"
                                            label="Median Household Income 2016"
                                            :filters="columnFilters['medianHouseholdIncome2016']"
                                            :filter-method="handleFilter"
                                    >
                                    </el-table-column>
                                    <el-table-column
                                            resizeable
                                            sortable
                                            width="290"
                                            prop="Median Household Income 2000"
                                            label="Median Household Income 2000"
                                            :filters="columnFilters['medianHouseholdIncome2000']"
                                            :filter-method="handleFilter"
                                    >
                                    </el-table-column>
                                    <el-table-column
                                            resizeable
                                            sortable
                                            width="170"
                                            prop="Income Growth"
                                            label="Income Growth"
                                            :filters="columnFilters['incomeGrowth']"
                                            :filter-method="handleFilter"
                                    >
                                    </el-table-column>
                                    <el-table-column
                                            resizeable
                                            sortable
                                            width="210"
                                            prop="Income Growth Grade"
                                            label="Income Growth Grade"
                                            :filters="columnFilters['incomeGrowthGrade']"
                                            :filter-method="handleFilter"
                                    >
                                    </el-table-column>
                                    <el-table-column
                                            resizeable
                                            sortable
                                            width="250"
                                            prop="Median House Value 2016"
                                            label="Median House Value 2016"
                                            :filters="columnFilters['medianHouseValue2016']"
                                            :filter-method="handleFilter"
                                    >
                                    </el-table-column>
                                    <el-table-column
                                            resizeable
                                            sortable
                                            width="250"
                                            prop="Median House Value 2000"
                                            label="Median House Value 2000"
                                            :filters="columnFilters['medianHouseValue2000']"
                                            :filter-method="handleFilter"
                                    >
                                    </el-table-column>
                                    <el-table-column
                                            resizeable
                                            sortable
                                            width="210"
                                            prop="House Value Growth"
                                            label="House Value Growth"
                                            :filters="columnFilters['houseValueGrowth']"
                                            :filter-method="handleFilter"
                                    >
                                    </el-table-column>
                                    <el-table-column
                                            resizeable
                                            sortable
                                            width="250"
                                            prop="House Value Growth Grade"
                                            label="House Value Growth Grade"
                                            :filters="columnFilters['houseValueGrowthGrade']"
                                            :filter-method="handleFilter"
                                    >
                                    </el-table-column>
                                    <el-table-column
                                            resizeable
                                            sortable
                                            width="190"
                                            prop="Crime Level Grade"
                                            label="Crime Level Grade"
                                            :filters="columnFilters['crimeLevelGrade']"
                                            :filter-method="handleFilter"
                                    >
                                    </el-table-column>
                                    <el-table-column
                                            resizeable
                                            sortable
                                            width="170"
                                            prop="Crime Change"
                                            label="Crime Change"
                                            :filters="columnFilters['crimeChange']"
                                            :filter-method="handleFilter"
                                    >
                                    </el-table-column>
                                    <el-table-column
                                            resizeable
                                            sortable
                                            width="210"
                                            prop="Crime Change Grade"
                                            label="Crime Change Grade"
                                            :filters="columnFilters['crimeChangeGrade']"
                                            :filter-method="handleFilter"
                                    >
                                    </el-table-column>

                                    <infinite-loading
                                            v-if="!loadingComplete"
                                            slot="append"
                                            :distance="1"
                                            @infinite="fetchRecords"
                                            spinner="spiral"
                                            force-use-infinite-wrapper=".el-table__body-wrapper"
                                    >
                                    </infinite-loading>
                                    <div class="text-center" v-if="loadingComplete" slot="append">All Records Returned.</div>
                                </el-table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div v-if="!searching" class="d-flex row" id="sponsor-logos">
                <div class="offset-2 col-8">
                    <div class="row justify-content-center">
                        <div class="col-6 col-md-4 col-lg mb-3">
                            <div class="icon-large zillow" id="zillow-logo"></div>
                        </div>
                        <div class="col-6 col-md-4 col-lg my-2">
                            <div class="icon-large trulia" id="trulia-logo"></div>
                        </div>
                        <div class="col-6 col-md-4 col-lg my-2">
                            <div class="icon-large realtorcom" id="realtorcom-logo"></div>
                        </div>
                        <div class="col-6 col-md-4 col-lg my-2">
                            <div class="icon-large redfin" id="redfin-logo"></div>
                        </div>
                        <div class="col-6 col-md-4 col-lg my-2">
                            <div class="icon-large homie" id="homie-logo"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="position-absolute fixed-bottom text-center">
                Wiserei™. Copyright 2019. All rights reserved. Click <a href="#">here</a> to view our privacy policy.
            </div>
        </div>
    </div>
</template>

<script>
    const Airtable = require('airtable')
    import states from '../constants/states'

    export default {
        name: 'Wiserei',
        props: [
            'airtable_api_key',
            'airtable_wiserei_base'
        ],
        data() {
            return {
                airtable: null,
                columnFilters: {},
                letterGrades: [
                    {
                        text: 'A+',
                        value: 'A+'
                    },
                    {
                        text: 'A',
                        value: 'A'
                    },
                    {
                        text: 'A-',
                        value: 'A-'
                    },
                    {
                        text: 'B+',
                        value: 'B+'
                    },
                    {
                        text: 'B',
                        value: 'B'
                    },
                    {
                        text: 'B-',
                        value: 'B-'
                    },
                    {
                        text: 'C+',
                        value: 'C+'
                    },
                    {
                        text: 'C',
                        value: 'C'
                    },
                    {
                        text: 'C-',
                        value: 'C-'
                    },
                    {
                        text: 'D+',
                        value: 'D+'
                    },
                    {
                        text: 'D',
                        value: 'D'
                    },
                    {
                        text: 'D-',
                        value: 'D-'
                    },
                    {
                        text: 'F',
                        value: 'F'
                    },
                ],
                loading: true,
                loadingComplete: false,
                loadingRecords: false,
                operators: [
                    '<', '=', '>'
                ],
                records: [],
                searchCity: null,
                searchFilters: {
                    states: [],
                    crimeChange: {
                        grades: [],
                        operator: '',
                        value: ''
                    },
                    crimeLevel: {
                        grades: [],
                        operator: '',
                        value: ''
                    },
                    houseValue: {
                        grades: [],
                        operator: '',
                        value: ''
                    },
                    incomeGrowth: {
                        grades: [],
                        operator: '',
                        value: ''
                    },
                    populationGrowth: {
                        grades: [],
                        operator: '',
                        value: ''
                    },
                    wisereiScore: {
                        grades: [],
                        operator: '',
                        value: ''
                    }
                },
                searching: false,
                selectedState: null,
                states: states.US,
                wait: true,
                window: {
                    height: 0,
                    width: 0
                }
            }
        },
        computed: {
            filterByFormula: function () {
                let city, state
                let formula = `AND(TRUE()`

                if (this.searchCity) {
                    city = _.startCase(_.toLower(this.searchCity))
                    formula += `, OR(FALSE(), City = '${city}')`
                }
                if (this.searchFilters.states.length) {
                    formula += `, OR(FALSE()`
                    this.searchFilters.states.forEach((state) => {
                        formula += `, State = '${state}'`
                    })
                    formula += `)`
                }

                Object.entries(this.searchFilters).forEach(([key, value]) => {
                    if (key != 'states') {
                        const startCaseKey = _.startCase(key)
                        if (value.grades.length || value.value) {
                            formula += `, OR(FALSE()`
                        }
                        if (value.grades.length) {
                            value.grades.forEach((grade) => {
                                formula += `, {${startCaseKey} Grade} = '${grade}'`
                            })
                        }
                        if (value.value) {
                            formula += `, {${startCaseKey}} ${value.operator} '${value.value}'`
                        }
                        if (value.grades.length || value.value) {
                            formula += `)`
                        }
                    }
                })
                formula += `)`

                console.log(formula)
                return formula
            },
            wisereiBackground: function () {
                let classAttribute = 'wiserei-background'
                if (this.searching) classAttribute += ' h-100vh ml-n3 mr-n4'
                return classAttribute
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
            },
            search() {
                this.searching = true
                this.loading = true
                this.records = []

                this.airtable('Data by City').select({
                    pageSize: 30,
                    view: "Grid view",
                    sort: [{field: 'Wiserei Grade', direction: 'asc'}, {field: 'Wiserei Score', direction: 'desc'}],
                    filterByFormula: this.filterByFormula
                }).eachPage((records, fetchNextPage) => {
                    this.loading = false

                    records.forEach((record) => {
                        this.records.push(record['fields'])
                        Object.entries(record['fields']).forEach(([key, value]) => {
                            const camelKey = _.camelCase(key)

                            if (!this.columnFilters.hasOwnProperty(camelKey)) {
                                this.columnFilters[camelKey] = []
                            }

                            const filterValues = this.columnFilters[camelKey].map(filter => filter.value)
                            if (!filterValues.includes(value)) {
                                this.columnFilters[camelKey].push({text: value, value: value})
                                this.columnFilters[camelKey] = _.sortBy(this.columnFilters[camelKey], (filter) => {
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
                }, (err) => {
                    if (err) console.error(err)
                    this.loadingComplete = true
                    window.events.$emit('allRecordsFetched')
                })
            },
            addState(state) {
                this.searchFilters.states = [ state.value ]
            }
        },
        created() {
            this.airtable = new Airtable({apiKey: this.airtable_api_key}).base(this.airtable_wiserei_base)

            window.addEventListener('resize', this.handleResize)
            this.handleResize()
        },
        mounted() {
            if (this.searching) {
                this.search()
            }
        },
        destroyed() {
            window.removeEventListener('resize', this.handleResize)
        }
    }
</script>
