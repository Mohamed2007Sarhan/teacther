<?php

$ip = $_SERVER['REMOTE_ADDR'];

$timeWindow = 1;
$maxRequests = 10;

// يمكنك استخدام قاعدة بيانات أو ملف نصي لتخزين السجلات
$recordsFile = 'records.txt';

// تحقق مما إذا كانت السجلات قد تجاوزت الحد الأقصى
$records = [];
if (file_exists($recordsFile)) {
    $records = unserialize(file_get_contents($recordsFile));
}

if (isset($records[$ip]) && $records[$ip]['requests'] >= $maxRequests) {
    echo "Block IP: " . $ip;
    exit;
}

// تحقق من فترة الوقت
if (isset($records[$ip]) && time() - $records[$ip]['time'] <= $timeWindow) {
    $records[$ip]['requests']++;
} else {
    $records[$ip] = [
        'requests' => 1,
        'time' => time()
    ];
}

// حفظ السجلات في الملف
file_put_contents($recordsFile, serialize($records));


?>
<!-- <center><footer><em><p style="display: inline-block;">&copy; All rights reserved 2023</p></em><span style="display: inline-block;"><a href="http://profile-muhammad-sarhan.eb2a.com/" style="text-decoration: none;">Mohammed Sarhan </a> - <em>Website Developer</em></span></footer></center> -->