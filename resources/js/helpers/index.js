import moment from 'moment';

export default function formattedDate (date,time){

    return moment(date).format(time)

}