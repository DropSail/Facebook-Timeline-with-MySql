<?php

/**
 * Create a alert for any validation 
 * @param $msg 
 * @param $type  
 */
function createAlert($msg, $type = "danger")
{
    return "<p class=\"alert alert-{$type} d-flex justify-content-between\">{$msg}<button class=\"btn-close\" data-bs-dismiss=\"alert\"></button></p>";
}

/**
 * Get old form values after submit a form 
 */
function old($field_name)
{
    return $_POST[$field_name] ?? '';
}


/**
 * Reset  form old data after a successful submit
 */
function reset_form()
{
    return $_POST = [];
}


/**
 * File Uploading Function 
 */

function fileUplaod(array $files, string $path = "media/")
{
    // file manage 
    $tmp_name = $files['tmp_name'];
    $file_name = $files['name'];


    // get file extension  
    $file_arr = explode('.', $file_name);
    $file_ext =  strtolower(end($file_arr));

    // file name unique 
    $unique_filename =  time() . '_' . rand(100000, 10000000) . '_' . str_shuffle('1234567890') . '.' . $file_ext;

    // uplaod fie 
    move_uploaded_file($tmp_name, $path . $unique_filename);

    // return file name 
    return $unique_filename;
}




function createID($prefix = 'USER')
{
    // Use the current timestamp
    $timestamp = time();

    // Generate a random string
    $randomString = bin2hex(random_bytes(5));

    // Combine prefix, timestamp, and random string to form a unique ID
    $uniqueID = $prefix . '_' . $timestamp . '_' . $randomString;

    return $uniqueID;
}



function timeAgo($timestamp) {
    // Check if the timestamp is a valid date string
    if (!$timestamp = strtotime($timestamp)) {
        return "Invalid date";  // Handle invalid date format
    }

    $current_time = time();
    $time_difference = $current_time - $timestamp;
    $seconds = $time_difference;

    $minutes      = round($seconds / 60);           // value 60 is seconds
    $hours        = round($seconds / 3600);         // value 3600 is 60 minutes * 60 sec
    $days         = round($seconds / 86400);        // value 86400 is 24 hours * 60 minutes * 60 sec
    $weeks        = round($seconds / 604800);       // value 604800 is 7 days * 24 hours * 60 minutes * 60 sec
    $months       = round($seconds / 2629440);      // value 2629440 is ((365+365+365+365+365)/5/12) days * 24 hours * 60 minutes * 60 sec
    $years        = round($seconds / 31553280);     // value 31553280 is 365.25 days * 24 hours * 60 minutes * 60 sec

    if ($seconds <= 60) {
        return "Just Now";
    } else if ($minutes <= 60) {
        if ($minutes == 1) {
            return "one minute ago";
        } else {
            return "$minutes minutes ago";
        }
    } else if ($hours <= 24) {
        if ($hours == 1) {
            return "an hour ago";
        } else {
            return "$hours hours ago";
        }
    } else if ($days <= 7) {
        if ($days == 1) {
            return "yesterday";
        } else {
            return "$days days ago";
        }
    } else if ($weeks <= 4.3) { // 4.3 == 30/7
        if ($weeks == 1) {
            return "one week ago";
        } else {
            return "$weeks weeks ago";
        }
    } else if ($months <= 12) {
        if ($months == 1) {
            return "one month ago";
        } else {
            return "$months months ago";
        }
    } else {
        if ($years == 1) {
            return "one year ago";
        } else {
            return "$years years ago";
        }
    }
}
