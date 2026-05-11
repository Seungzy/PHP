<?php
$permissionToRegister = 'Yes';
$date = '2026-05-11';
$studentNumber = '123456';
$entryDate = '2026-09-01';
$entryType = 'New';
$grade = '10';
$oen = '987654321';
$academicYear = '2026-2027';
$isExpelled = false;

$lastName = 'gojo';
$firstName = 'satoru';
$middleName = 'strongest';
$gender = 'Male';
$dobYear = 2008;
$dobMonth = 7;
$dobDay = 15;
$proofOfBirth = 'Birth Certificate';

$previousSchool = 'Tokyo Jujutsu High School';
$gradeAtPreviousSchool = 'Grade 12';
$dateOfGraduation = 'March 2009';
$disciplinaryAction = 'No';
$disciplinaryReasons = 'N/A';

$medicalConditions = 'Asthma, uses inhaler as needed.';
$immunizationProvided = true;
$epiPenRequired = false;

$birthCountry = 'Japan';
$provinceOfBirth = 'Kyoto';
$countryOfCitizenship = 'Japanese';


$studentNumberFormatted = str_pad($studentNumber, 9, '0', STR_PAD_LEFT);
$oenFormatted = chunk_split($oen, 3, '-');
$fullLegalName = strtoupper("$lastName") . ', ' . ucwords("$firstName $middleName");
$displayDob = date('F j, Y', strtotime("1989-12-07"));
$expelledText = $isExpelled ? 'Yes' : 'No';
$immunizationText = $immunizationProvided ? 'Yes' : 'No';
$epiPenText = $epiPenRequired ? 'Yes' : 'No';
$attendedWRDSBText = $attendedWRDSB ? 'Yes' : 'No';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration Form</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="document">
        <h1>Student Registration Form</h1>
        
        <table class="header-table">
            <tr>
                <td><label>For School Use - Permission to Register:</label> <?= htmlspecialchars($permissionToRegister) ?></td>
                <td><label>Date:</label> <?= htmlspecialchars($date) ?></td>
            </tr>
            <tr>
                <td><label>Student Number:</label> <?= htmlspecialchars($studentNumberFormatted) ?></td>
                <td><label>Entry Date:</label> <?= htmlspecialchars($entryDate) ?></td>
                <td><label>Entry Type:</label> <?= htmlspecialchars($entryType) ?></td>
                <td><label>Year Level:</label> <?= htmlspecialchars($grade) ?></td>
            </tr>
            <tr>
                <td colspan="2"><label>Adcon Number:</label> <?= htmlspecialchars($oenFormatted) ?></td>
                <td colspan="2"><label>Academic Year:</label> <?= htmlspecialchars($academicYear) ?></td>
            </tr>
        </table>

        <div class="form-section">
            <h2>Is the student currently expelled from any school or school board?</h2>
            <p><input type="text" readonly value="<?= htmlspecialchars($expelledText) ?>"></p>
        </div>

        <div class="form-section">
            <h2>Student Information</h2>
            <table class="data-table">
                <tr>
                    <td style="width: 25%;">
                        <label>Full Legal Name</label>
                        <p><?= htmlspecialchars($fullLegalName) ?></p>
                    </td>
                    <td style="width: 25%;">
                        <label>Last Name</label>
                        <input type="text" readonly value="<?= htmlspecialchars(strtoupper($lastName)) ?>">
                    </td>
                    <td style="width: 25%;">
                        <label>First Name</label>
                        <input type="text" readonly value="<?= htmlspecialchars(ucwords($firstName)) ?>">
                    </td>
                    <td style="width: 25%;">
                        <label>Middle Name</label>
                        <input type="text" readonly value="<?= htmlspecialchars(ucwords($middleName)) ?>">
                    </td>
                </tr>
            </table>

            <table class="data-table">
                <tr>
                    <td style="width: 20%;">
                        <label>Gender</label>
                        <input type="text" readonly value="<?= htmlspecialchars($gender) ?>">
                    </td>
                    <td style="width: 20%;">
                        <label>Date of Birth</label>
                        <p><?= htmlspecialchars($displayDob) ?></p>
                    </td>
                    <td style="width: 20%;">
                        <label>Proof of Birth</label>
                        <input type="text" readonly value="<?= htmlspecialchars($proofOfBirth) ?>">
                    </td>
                </tr>
            </table>
        </div>

        <div class="form-section">
            <h2>Previous School Information</h2>
            <table class="data-table">
                <tr>
                    <td style="width: 50%;">
                        <label>Name of Previous School</label>
                        <input type="text" readonly value="<?= htmlspecialchars($previousSchool) ?>">
                    </td>
                    <td style="width: 50%;">
                        <label>Date of Graduation</label>
                        <input type="text" readonly value="<?= htmlspecialchars($dateOfGraduation) ?>">
                    </td>
                </tr>
            </table>

            <table class="data-table">
                <tr>
                    <td style="width: 100%;">
                        <label>Grade at Previous School</label>
                        <input type="text" readonly value="<?= htmlspecialchars($gradeAtPreviousSchool) ?>">
                    </td>
                </tr>
            </table>

            <h3>Has student been involved in a disciplinary action?</h3>
            <table class="data-table">
                <tr>
                    <td style="width: 30%;">
                        <label>Yes / No</label>
                        <p><?= htmlspecialchars($disciplinaryAction) ?></p>
                    </td>
                    <td style="width: 70%;">
                        <label>If yes, state reasons</label>
                        <input type="text" readonly value="<?= htmlspecialchars($disciplinaryReasons) ?>">
                    </td>
                </tr>
            </table>
        </div>

        <div class="form-section">
            <h2>Health Information</h2>
            <label>Medical Conditions (include information on special equipment or medication, if required)</label>
            <textarea readonly class="med-textarea"><?= htmlspecialchars($medicalConditions) ?></textarea>

            <table class="data-table">
                <tr>
                    <td style="width: 50%;">
                        <label>Immunization Record Provided</label>
                        <p><?= htmlspecialchars($immunizationText) ?></p>
                    </td>
                    <td style="width: 50%;">
                        <label>Does the student require an epi-pen?</label>
                        <p><?= htmlspecialchars($epiPenText) ?></p>
                    </td>
                </tr>
            </table>
        </div>

        <div class="form-section">
            <h2>Citizenship Information</h2>
            <table class="data-table">
                <tr>
                    <td style="width: 50%;">
                        <label>Birth Country</label>
                        <input type="text" readonly value="<?= htmlspecialchars($birthCountry) ?>">
                    </td>
                    <td style="width: 50%;">
                        <label>Province of Birth</label>
                        <input type="text" readonly value="<?= htmlspecialchars($provinceOfBirth) ?>">
                    </td>
                </tr>
            </table>

            <table class="data-table">
                <tr>
                    <td style="width: 100%;">
                        <label>Citizenship</label>
                        <input type="text" readonly value="<?= htmlspecialchars($countryOfCitizenship) ?>">
                    </td>
                </tr>
            </table>
        </div>

        <div class="summary-section">
            <h2>DO NOT WRITE UNDER THIS. For Office Use Only</h2>
            <table class="summary-table">
                <tr>
                    <td><strong>Full Legal Name:</strong><br><?= htmlspecialchars($fullLegalName) ?></td>
                    <td><strong>Student Number:</strong><br><?= htmlspecialchars($studentNumberFormatted) ?></td>
                    <td><strong>Adcon Number:</strong><br><?= htmlspecialchars($oenFormatted) ?></td>
                </tr>
                <tr>
                    <td><strong>Birth Date:</strong><br><?= htmlspecialchars($displayDob) ?></td>
                    <td><strong>Gender:</strong><br><?= htmlspecialchars($gender) ?></td>
                    <td><strong>Citizenship:</strong><br><?= htmlspecialchars($countryOfCitizenship) ?></td>
                </tr>
            </table>
        </div>
    </div>

</body>
</html>
