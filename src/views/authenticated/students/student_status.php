<?php
function getStudentStatus($student_credits) {
    $status = [
        'status'                => 'green',
        'violation_status'      => '',
        'description'           => '',
        'access'                => '',
        'clearance'             => 'OK',
        'pendingStatus'         => 'success',
        'requests_certificate'  => 'Allowed',
        'requests_status'       => 'success',
        'Enrollment'            => 'Allowed',
        'isallowed'             => 'success'
    ];

    if (isset($student_credits)) {
        switch (true) {
            case ($student_credits >= 90):
                $status['status'] = 'green';
                $status['violation_status'] = 'Clear / No Violation';
                $status['description'] = 'Student has no record of misconduct.';
                $status['access'] = 'Full access to all school services (library, enrollment, good moral certificate, events).';
                break;

            case ($student_credits >= 80):
                $status['status'] = 'yellow';
                $status['violation_status'] = 'Minor Violation';
                $status['description'] = 'Student committed small offenses (e.g., tardiness, dress code issues).';
                $status['access'] = 'Normal access, but receives a warning. Records kept for monitoring.';
                $status['clearance'] = 'Pending';
                $status['pendingStatus'] = 'warning';
                break;

            case ($student_credits >= 70):
                $status['status'] = 'red';
                $status['violation_status'] = 'Needs Clearance';
                $status['description'] = 'Student has multiple or moderate violations (e.g., cutting classes, disrespect, repeated tardiness).';
                $status['access'] = 'Cannot request good moral certificate or clearance for internships until settled with guidance office.';
                $status['clearance'] = 'Pending';
                $status['pendingStatus'] = 'warning';
                $status['requests_certificate'] = 'Denied';
                $status['requests_status'] = 'danger';
                break;

            case ($student_credits <= 67):
                $status['status'] = 'red';
                $status['violation_status'] = 'Banned';
                $status['description'] = 'Student committed serious violations (e.g., cheating, bullying, vandalism).';
                $status['access'] = 'Blocked from enrollment, events, and clearance requests. Must face disciplinary action before regaining access';
                $status['clearance'] = 'Denied';
                $status['pendingStatus'] = 'danger';
                $status['requests_certificate'] = 'Denied';
                $status['requests_status'] = 'danger';
                $status['Enrollment'] = 'Denied';
                $status['isallowed'] = 'danger';
                break;
        }
    }

    return $status;
}
?>