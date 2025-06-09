<?php
    $usn_cgpa=array(
        "2sd22is001"=>8.9,
        "2sd22is400"=>9.9,
        "2sd22is200"=>9.2
    );

    // Print before sorting
    echo "Before sorting:\n";
    print_r($usn_cgpa);
    echo "\n";

    // Sort by keys (USN) using ksort()
    ksort($usn_cgpa);
    echo "After sorting by USN (ksort):\n";
    print_r($usn_cgpa);
    echo "\n";

    // Sort by values (CGPA) in ascending order using asort()
    asort($usn_cgpa);
    echo "After sorting by CGPA (ascending - asort):\n";
    print_r($usn_cgpa);
    echo "\n";

    // Sort by values (CGPA) in descending order using arsort()
    arsort($usn_cgpa);
    echo "After sorting by CGPA (descending - arsort):\n";
    print_r($usn_cgpa);
    echo "\n";
?>