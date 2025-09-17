                                    $stmt = $conn->prepare("UPDATE students SET
                                        first_name=?, middle_name=?, last_name=?, birthday=?, sex=?, religion=?, nationality=?,
                                        guardian=?, student_credits=?, course=?, year_level=?, student_status=?, academic_standing=?, current_gpa=?,
                                        hasBirthCertificate=?, hasGoodMoral=?, hasReportCard=?, hasIDPicture=?, hasMedical_record=?, hasForm137=?
                                        WHERE student_id=?
                                    ");


                                    if (!$stmt) {
                                        echo "<script>alert('Prepare failed: " . $conn->error . "');</script>";
                                    }

                                    $stmt->bind_param(
                                        "ssssssssisisdiiiiii",
                                        $first_name, $middle_name, $last_name, $birthday, $sex, $religion, $nationality,
                                        $guardian, $student_credits, $course, $year_level, $student_status, $academic_standing, $current_gpa,
                                        $hasBirthCertificate, $hasGoodMoral, $hasReportCard, $hasIDPicture, $hasMedical_record, $hasForm137,
                                        $student_id
                                    );