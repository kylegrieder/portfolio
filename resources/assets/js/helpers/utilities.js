export const formatDateTime = (dateTime, type) => {
    switch (type) {
        case 'relative':
            return moment.utc(dateTime).local().fromNow()
            break
        case 'absolute':
        default:
            return moment.utc(dateTime).local().format(DATE_FORMATS.LOCALIZED.SHORTDATETIME)
    }
}
