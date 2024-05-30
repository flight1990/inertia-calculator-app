import moment from "moment";

export function useDateTransformer(iDate, iFormat = 'DD.MM.YYYY HH:mm:ss') {
    if (!iDate) return null;

    return moment(iDate).format(iFormat);
}
