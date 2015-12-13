# RelativeTime
Relative Time Calculator for PHP in 100 lines
Relative time has been increasing popular amoung social media applications and micro-blog posts where the exact date content was posted isn't important or can be confusing to the end-user. 
The Library compares two Unix timestamps and outputs the elapsed time in minutes, hours, days, months or years.

Note: Relative time is different from elapsed time. Elapsed time has a focus on accuracy whereas relative time tries to be as human-readable as possible-even if it uses excessive rounding to do so. Relative time is not supposed to be accurate, therefore it should only be utilized in specific use cases. 

## Install via composer

Run this command in this command in your terminal to quickly install the package using composer.

    composer require bendahrooge/relative-time
    
If you don't know what composer is (its pretty awesum) [check out the documentation to install it.](https://getcomposer.org/doc/00-intro.md)

## Getting Relative Time

If you're using composer, the class will already be included by default on every script. 
You can start an instance of the class like this: 

    $RelativeTime = new bendahrooge\RelativeTime;

The Library has 3 public functions avaible for use
All functions only support Unix time at the moment, if you wanna fix that and make a pull request that's cool. 

    $RelativeTime = new bendahrooge\RelativeTime;
    
    $lastyear = $RelativeTime->since(1420000000); //This is Unix time for Wed Dec 31 2014 04:26:40
    $afewdays = $RelativeTime->between(array(1449964800, 1450137600)); //About 1 day passing
    $cantwait = $RelativeTime->until(1513296000); //Some time in the future
