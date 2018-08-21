// gets all the files that have a '.vue' extension in the current folder (not including sub-folders)
const files = require.context('./', true, /\.vue$/)

files.keys().forEach((key) => {

    let fileName = '';
    let path = key.replace(/(\.\/|\.vue)/g, '')
    // fileName = _.last(path.split('/')) // necessary for nested folders to work. lodash isn't working for some reason. //TODO: fix lodash
    Vue.component(fileName, require('./' + path).default)
})