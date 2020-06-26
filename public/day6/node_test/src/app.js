import { log, error, hello } from './logger';
import md5 from 'md5';
import $ from 'jquery';
import { Auto as Car } from './classes/Auto';


$(document).ready(function(){
    log(md5('steve@glort.com'));
});

log('Application loaded!');

log('My new logger is working');

error('My new error logger is working');

log('We just enabled watch!');

log('We just enabled webpack-dev-server!');

// hello('Howdy, from Webpack!');

var car1 = new Car('Honda', 'Civic', 2020);
var car2 = new Car('Chevy', 'Malibu', 2016);

log(car1);

log(car2);

