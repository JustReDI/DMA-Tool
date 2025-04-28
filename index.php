<?php

$allscores = array();

function calcScore($row1, $row2, $row3, $row4, $row5) {
    $allrows = array();
    if(is_array($row1)) {
        $allrows = array_merge($allrows, $row1);
    }
    if(is_array($row2)) {
        $allrows = array_merge($allrows, $row2);
    }
    if(is_array($row3)) {
        $allrows = array_merge($allrows, $row3);
    }
    if(is_array($row4)) {
        $allrows = array_merge($allrows, $row4);
    }
    if(is_array($row5)) {
        $allrows = array_merge($allrows, $row5);
    }
    $cntval = array_count_values($allrows);

    return round(((isset($cntval[1]) ? $cntval[1] * 0.06 : 0) + (isset($cntval[2]) ? $cntval[2] * 0.06 : 0) + (isset($cntval[3]) ? $cntval[3] * 0.08 : 0)) * 100,2);
}
// Output messages
$response = '';
// Check if the form was submitted
if (isset($_POST['email'], $_POST['afm'], $_POST['company'], $_POST['sector'], $_POST['sector_level1'], $_POST['region'], $_POST['regional_unit'])) {

    $successful = false;

    for($i = 'a'; $i <= 'i'; $i++){
        $allscores['check_'.$i] = calcScore((isset($_POST['check_'.$i.'1']) ? $_POST['check_'.$i.'1'] : null),(isset($_POST['check_'.$i.'2']) ? $_POST['check_'.$i.'2'] : null),(isset($_POST['check_'.$i.'3']) ? $_POST['check_'.$i.'3'] : null),(isset($_POST['check_'.$i.'4']) ? $_POST['check_'.$i.'4'] : null),(isset($_POST['check_'.$i.'5']) ? $_POST['check_'.$i.'5'] : null));
    }

    $servername = "*******************";
    $username = "*******************";
    $password = "*******************";
    $dbname = "*******************";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if (!($conn->connect_error)) {
        $sql = "INSERT INTO DMAAnswer (CheckA1, CheckA2, CheckA3, CheckA4, CheckA5, CheckAScore, CheckB1, CheckB2, CheckB3, CheckB4, CheckB5, CheckBScore, CheckC1, CheckC2, CheckC3, CheckC4, CheckC5, CheckCScore, CheckD1, CheckD2, CheckD3, CheckD4, CheckD5, CheckDScore, CheckE1, CheckE2, CheckE3, CheckE4, CheckE5, CheckEScore, CheckF1, CheckF2, CheckF3, CheckF4, CheckF5, CheckFScore, CheckG1, CheckG2, CheckG3, CheckG4, CheckG5, CheckGScore, CheckH1, CheckH2, CheckH3, CheckH4, CheckH5, CheckHScore, CheckI1, CheckI2, CheckI3, CheckI4, CheckI5, CheckIScore, TotalScore, Company, AFM, Sector, Sector_Level1, Email, Region, RegionalUnit) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt=$conn->prepare($sql);
        $stmt->bind_param("iiiiidiiiiidiiiiidiiiiidiiiiidiiiiidiiiiidiiiiidiiiiiddsisssss", $CheckA1, $CheckA2, $CheckA3, $CheckA4, $CheckA5, $CheckAScore, $CheckB1, $CheckB2, $CheckB3, $CheckB4, $CheckB5, $CheckBScore, $CheckC1, $CheckC2, $CheckC3, $CheckC4, $CheckC5, $CheckCScore, $CheckD1, $CheckD2, $CheckD3, $CheckD4, $CheckD5, $CheckDScore, $CheckE1, $CheckE2, $CheckE3, $CheckE4, $CheckE5, $CheckEScore, $CheckF1, $CheckF2, $CheckF3, $CheckF4, $CheckF5, $CheckFScore, $CheckG1, $CheckG2, $CheckG3, $CheckG4, $CheckG5, $CheckGScore, $CheckH1, $CheckH2, $CheckH3, $CheckH4, $CheckH5, $CheckHScore, $CheckI1, $CheckI2, $CheckI3, $CheckI4, $CheckI5, $CheckIScore, $TotalScore, $Company, $AFM, $Sector, $Sector_Level1, $Email, $Region, $RegionalUnit);       
        
        $CheckA1 = (isset($_POST['check_a1']) ? max($_POST['check_a1']) : 0);
        $CheckA2 = (isset($_POST['check_a2']) ? max($_POST['check_a2']) : 0);
        $CheckA3 = (isset($_POST['check_a3']) ? max($_POST['check_a3']) : 0);
        $CheckA4 = (isset($_POST['check_a4']) ? max($_POST['check_a4']) : 0);
        $CheckA5 = (isset($_POST['check_a5']) ? max($_POST['check_a5']) : 0);
        $CheckAScore = $allscores['check_a'];
        $CheckB1 = (isset($_POST['check_b1']) ? max($_POST['check_b1']) : 0);
        $CheckB2 = (isset($_POST['check_b2']) ? max($_POST['check_b2']) : 0);
        $CheckB3 = (isset($_POST['check_b3']) ? max($_POST['check_b3']) : 0);
        $CheckB4 = (isset($_POST['check_b4']) ? max($_POST['check_b4']) : 0);
        $CheckB5 = (isset($_POST['check_b5']) ? max($_POST['check_b5']) : 0);
        $CheckBScore = $allscores['check_b'];
        $CheckC1 = (isset($_POST['check_c1']) ? max($_POST['check_c1']) : 0);
        $CheckC2 = (isset($_POST['check_c2']) ? max($_POST['check_c2']) : 0);
        $CheckC3 = (isset($_POST['check_c3']) ? max($_POST['check_c3']) : 0);
        $CheckC4 = (isset($_POST['check_c4']) ? max($_POST['check_c4']) : 0);
        $CheckC5 = (isset($_POST['check_c5']) ? max($_POST['check_c5']) : 0);
        $CheckCScore = $allscores['check_c'];
        $CheckD1 = (isset($_POST['check_d1']) ? max($_POST['check_d1']) : 0);
        $CheckD2 = (isset($_POST['check_d2']) ? max($_POST['check_d2']) : 0);
        $CheckD3 = (isset($_POST['check_d3']) ? max($_POST['check_d3']) : 0);
        $CheckD4 = (isset($_POST['check_d4']) ? max($_POST['check_d4']) : 0);
        $CheckD5 = (isset($_POST['check_d5']) ? max($_POST['check_d5']) : 0);
        $CheckDScore = $allscores['check_d'];
        $CheckE1 = (isset($_POST['check_e1']) ? max($_POST['check_e1']) : 0);
        $CheckE2 = (isset($_POST['check_e2']) ? max($_POST['check_e2']) : 0);
        $CheckE3 = (isset($_POST['check_e3']) ? max($_POST['check_e3']) : 0);
        $CheckE4 = (isset($_POST['check_e4']) ? max($_POST['check_e4']) : 0);
        $CheckE5 = (isset($_POST['check_e5']) ? max($_POST['check_e5']) : 0);
        $CheckEScore = $allscores['check_e'];
        $CheckF1 = (isset($_POST['check_f1']) ? max($_POST['check_f1']) : 0);
        $CheckF2 = (isset($_POST['check_f2']) ? max($_POST['check_f2']) : 0);
        $CheckF3 = (isset($_POST['check_f3']) ? max($_POST['check_f3']) : 0);
        $CheckF4 = (isset($_POST['check_f4']) ? max($_POST['check_f4']) : 0);
        $CheckF5 = (isset($_POST['check_f5']) ? max($_POST['check_f5']) : 0);
        $CheckFScore = $allscores['check_f'];
        $CheckG1 = (isset($_POST['check_g1']) ? max($_POST['check_g1']) : 0);
        $CheckG2 = (isset($_POST['check_g2']) ? max($_POST['check_g2']) : 0);
        $CheckG3 = (isset($_POST['check_g3']) ? max($_POST['check_g3']) : 0);
        $CheckG4 = (isset($_POST['check_g4']) ? max($_POST['check_g4']) : 0);
        $CheckG5 = (isset($_POST['check_g5']) ? max($_POST['check_g5']) : 0);
        $CheckGScore = $allscores['check_g'];
        $CheckH1 = (isset($_POST['check_h1']) ? max($_POST['check_h1']) : 0);
        $CheckH2 = (isset($_POST['check_h2']) ? max($_POST['check_h2']) : 0);
        $CheckH3 = (isset($_POST['check_h3']) ? max($_POST['check_h3']) : 0);
        $CheckH4 = (isset($_POST['check_h4']) ? max($_POST['check_h4']) : 0);
        $CheckH5 = (isset($_POST['check_h5']) ? max($_POST['check_h5']) : 0);
        $CheckHScore = $allscores['check_h'];
        $CheckI1 = (isset($_POST['check_i1']) ? max($_POST['check_i1']) : 0);
        $CheckI2 = (isset($_POST['check_i2']) ? max($_POST['check_i2']) : 0);
        $CheckI3 = (isset($_POST['check_i3']) ? max($_POST['check_i3']) : 0);
        $CheckI4 = (isset($_POST['check_i4']) ? max($_POST['check_i4']) : 0);
        $CheckI5 = (isset($_POST['check_i5']) ? max($_POST['check_i5']) : 0);
        $CheckIScore = $allscores['check_i'];
        $TotalScore = round(array_sum($allscores)/count($allscores),2);
        $Company = $_POST['company'];
        $AFM = $_POST['afm'];
		$Sector = $_POST['sector'];
		$Sector_Level1 = $_POST['sector_level1'];
        $Email = $_POST['email'];
        $Region = $_POST['region'];
        $RegionalUnit = $_POST['regional_unit'];

        if ($stmt->execute()) {
            $successful = true;
        }
        $conn->close();
    }

    if ($successful) {
        // Success

        $response = ''.
        '<div class="fields">'.
        '<h2>Αποτελέσματα Αξιολόγησης Ψηφιακής Ωριμότητας<h2><br/>'.
        '<p>'.'<label for="company">Επωνυμία Φορέα/Επιχείρησης:</label>'.
            ' '. $_POST['company'] .'</p>'. 
        '<p>'.'<label for="afm">Αριθμός Φορολογικού Μητρώου (ΑΦΜ):</label>'.
            ' '. $_POST['afm'] .'</p>'.   
        '<p>'.'<label for="email">Διεύθυνση Email:</label>'.
            ' '. $_POST['email'] .'</p>'.
        '<p>Στον πίνακα καταγράφεται η βαθμολογία του επιπέδου ωριμότητας που λάβατε για καθέναν από τους 9 πυλώνες και, στην συνέχεια, υπολογίζεται για τον οργανισμό σας μια συνολική βαθμολογία.</p>'.
        '<table width="60%">'.
        '<tbody>'.
            '<tr>'.
                '<th width="70%" style="background-color: #59aa47;"><p><strong>Πυλώνας</strong></p></th>'.
                '<th width="30%" style="background-color: #59aa47;text-align: center;"><p><strong>Βαθμολόγηση Επιπέδου Ωριμότητας</strong></p></th>'.
            '</tr>'.
            '<tr>'.
                '<td style="background-color: #cbe7c5;">'.
                    '<p>Διακυβέρνηση &amp; Ηγεσία</p>'.
                '</td>'.
                '<td style="background-color: #cbe7c5;text-align: center;">'.
                    '<p>' . $allscores['check_a'] . '%</p>'.
                '</td>'.
            '</tr>'.
            '<tr>'.
                '<td style="background-color: #91cc84;">'.
                    '<p>Άνθρωποι &amp; Κουλτούρα</p>'.
                '</td>'.
                '<td style="background-color: #91cc84;text-align: center;">'.
                    '<p>' . $allscores['check_b'] . '%</p>'.
                '</td>'.
            '</tr>'.
            '<tr>'.
                '<td style="background-color: #cbe7c5;">'.
                    '<p>Δυναμικότητα &amp; Ικανότητα</p>'.
                '</td>'.
                '<td style="background-color: #cbe7c5;text-align: center;">'.
                    '<p>' . $allscores['check_c'] . '%</p>'.
                '</td>'.
            '</tr>'.
            '<tr>'.
                '<td style="background-color: #91cc84;">'.
                    '<p>Καινοτομία</p>'.
                '</td>'.
                '<td style="background-color: #91cc84;text-align: center;">'.
                    '<p>' . $allscores['check_d'] . '%</p>'.
                '</td>'.
            '</tr>'.
            '<tr>'.
                '<td style="background-color: #cbe7c5;">'.
                    '<p>Τεχνολογία</p>'.
                '</td>'.
                '<td style="background-color: #cbe7c5;text-align: center;">'.
                    '<p>' . $allscores['check_e'] . '%</p>'.
                '</td>'.
            '</tr>'.
            '<tr>'.
                '<td style="background-color: #91cc84;">'.
                    '<p>Πράσινη Μετάβαση</p>'.
                '</td>'.
                '<td style="background-color: #91cc84;text-align: center;">'.
                    '<p>' . $allscores['check_f'] . '%</p>'.
                '</td>'.
            '</tr>'.
            '<tr>'.
                '<td style="background-color: #cbe7c5;">'.
                    '<p>Κοινωνικές Επιπτώσεις</p>'.
                '</td>'.
                '<td style="background-color: #cbe7c5;text-align: center;">'.
                    '<p>' . $allscores['check_g'] . '%</p>'.
                '</td>'.
            '</tr>'.
            '<tr>'.
                '<td style="background-color: #91cc84;">'.
                    '<p>Γαλάζια Οικονομία</p>'.
                '</td>'.
                '<td style="background-color: #91cc84;text-align: center;">'.
                    '<p>' . $allscores['check_h'] . '%</p>'.
                '</td>'.
            '</tr>'.
            '<tr>'.
                '<td style="background-color: #cbe7c5;">'.
                    '<p>Δίκαιη Μετάβαση</p>'.
                '</td>'.
                '<td style="background-color: #cbe7c5;text-align: center;">'.
                    '<p>' . $allscores['check_i'] . '%</p>'.
                '</td>'.
            '</tr>'.
            '<tr>'.
                '<td style="background-color: #59aa47;">'.
                    '<p><strong>Συνολική βαθμολογία ψηφιακής ωριμότητας</strong></p>'.
                '</td>'.
                '<td style="background-color: #59aa47;text-align: center;">'.
                    '<p><strong>' . round(array_sum($allscores)/count($allscores),2) . '%</strong></p>'.
                '</td>'.
            '</tr>'.								
        '</tbody>'.
        '</table>'.
        '<br/>'.
        '<canvas id="dmaChart" style="width:100%;max-width:600px"></canvas>'.
        '<script>'.
        'new Chart("dmaChart", {'.
          'type: "bar",'.
          'data: {'.
            'labels: ["Διακυβέρνηση & Ηγεσία", "Άνθρωποι & Κουλτούρα", "Δυναμικότητα & Ικανότητα", "Καινοτομία", "Τεχνολογία", "Πράσινη Μετάβαση", "Κοινωνικές Επιπτώσεις", "Γαλάζια Οικονομία", "Δίκαιη Μετάβαση", "Συνολική Bαθμολογία"],'.
            'datasets: [{'.
              'borderWidth: 1,'.
              'backgroundColor: ["rgba(112,173,71,' . $allscores['check_a']/100 . ')", "rgba(112,173,71,' . $allscores['check_b']/100 . ')", "rgba(112,173,71,' . $allscores['check_c']/100 . ')", "rgba(112,173,71,' . $allscores['check_d']/100 . ')", "rgba(112,173,71,' . $allscores['check_e']/100 . ')", "rgba(112,173,71,' . $allscores['check_f']/100 . ')", "rgba(112,173,71,' . $allscores['check_g']/100 . ')", "rgba(112,173,71,' . $allscores['check_h']/100 . ')", "rgba(112,173,71,' . $allscores['check_i']/100 . ')", "rgba(255,153,0,' . round(array_sum($allscores)/count($allscores),2)/100 . ')"],'.
              'borderColor: ["rgb(112,173,71)", "rgb(112,173,71)", "rgb(112,173,71)", "rgb(112,173,71)", "rgb(112,173,71)", "rgb(112,173,71)", "rgb(112,173,71)", "rgb(112,173,71)", "rgb(112,173,71)", "rgb(255,153,0)"],'.
              'data: [' . $allscores['check_a'] . ', '. $allscores['check_b'] . ', '. $allscores['check_c'] . ', '. $allscores['check_d'] . ', '. $allscores['check_e'] . ', '. $allscores['check_f'] . ', '. $allscores['check_g'] . ', '. $allscores['check_h'] . ', '. $allscores['check_i'] . ', '. round(array_sum($allscores)/count($allscores),2) . ']'.
            '}]'.
          '},'.
          'options: {'.
            'plugins: {'.
                'tooltip: {'.
                    'callbacks: {'.
                        'label: function(context) {'.
                            'let label = context.dataset.label || "";'.
                            'if (label) {'.
                                'label += ": ";'.
                            '}'.
                            'if (context.parsed.y !== null) {'.
                                'label += " "+ context.parsed.y + "%";'.
                            '}'.
                            'return label;'.
                        '}'.
                    '}'.
                '},'.
                'legend: {'.
                    'display: false'.
                '},'.
                'title: {'.
                    'display: true,'.
                    'text: "Αποτελέσματα Αξιολόγησης Ψηφιακής Ωριμότητας"'.
                '}'.
            '},'.
            'scales: {'.
              'y: {'.
                'ticks: {'.
                    'callback: function(value, index, ticks) {'.
                        'return value + "%";'.
                    '}'.
                '},'.
                'title: {'.
                    'display: true,'.
                    'text: "Βαθμολόγηση Επιπέδου Ωριμότητας",'.
                '},'.
                'max: 100,'.
                'beginAtZero: true'.
              '}'.
            '}'.
          '}'.
        '});'.
        '</script>'. 
        '</div>'.
        '<div class="buttons noPrint">'.
            '<input type="button" class="btn" onclick="window.print();" value="Εκτύπωση">'.
        '</div>';      
    } else {
        // Fail
        $response = '<h3>Error!</h3><p>DMA rating could not be saved! Please contact with the administrator of this tool!</p>';
    }
}
?>

<!DOCTYPE html>
<html lang="el">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=.5,user-scalable=yes">
    <title>JustReDI - Εργαλείο Αξιολόγησης Ψηφιακής Ωριμότητας</title>
	<link rel="icon" href="img/justredi-ggek-mindev-logo.png" sizes="32x32">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.2/dist/chart.umd.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form class="survey-form" method="post" action="">
        <table width="100%">
            <tbody>
                <tr>
                    <td style="text-align: left;vertical-align: middle;"><a href="https://www.justredi.gr"><img src="img/justredi-ggek-mindev-logo.png" style="padding: 10px 0px 0px 25px;height: 80px;"/></a></td>
                    <td style="text-align: right;vertical-align: middle;"><a href="https://greece20.gov.gr"><img src="img/Greece 2.0_NextGeneration_gr_1.jpg" style="padding: 10px 25px 0px 0px;height: 70px;"/></a></td>
                </tr>
            </tbody>
        </table>
        <!-- place code here -->
        <h1 class="noPrint"><i class="far fa-list-alt"></i>JustReDI - Εργαλείο Αξιολόγησης Ψηφιακής Ωριμότητας</h1>

        <div class="steps noPrint">
            <div class="step current"></div>
            <div class="step"></div>
            <div class="step"></div>
            <div class="step"></div>
            <div class="step"></div>
            <div class="step"></div>
            <div class="step"></div>
            <div class="step"></div>
            <div class="step"></div>
            <div class="step"></div>
            <div class="step"></div>
        </div>

        <!-- Step 1 - A. Διακυβέρνηση & Ηγεσία -->
        <div class="step-content current" data-step="1">
        <div class="fields">
                <h2>Διακυβέρνηση και Ηγεσία<h2>
                        <p>
                            <b>Βαθμός υποστήριξης των ψηφιακών δράσεων από τη διοίκηση. Ύπαρξη συνεργασιών και συμπράξεων για θέματα Ψηφιακού Μετασχηματισμού. Πρωτοβουλίες και δράσεις Ψηφιακού Μετασχηματισμού. Σύστημα παρακολούθησης των δράσεων και διαχείριση δεδομένων. Λεπτομερής περιγραφή των ρόλων και των αρμοδιοτήτων σε θέματα Ψηφιακού Μετασχηματισμού.</b>
                            <br /><br />
                            <small>Διαβάστε τα χαρακτηριστικά των 3 επιπέδων ψηφιακής ωριμότητας («1 - Πρώιμο» έως το «3 - Προηγμένο») και για κάθε κριτήριο (δηλαδή για κάθε γραμμή) σημειώστε το χαρακτηριστικό του επιπέδου που θεωρείτε ότι ισχύει για τον οργανισμό σας. Όταν ολοκληρώσετε τις επιλογές σας, πατήστε <b>«Επόμενο»</b>.</small>
                        </p>
                        <table width="100%">
                            <tbody>
                                <tr>
                                    <th width="5%"></th>
                                    <th colspan="2" style="background-color: #59aa47;text-align: center;" width="31%">
                                        <p><strong>Επίπεδο 1<br />Πρώιμο</strong></p>
                                    </th>
                                    <th width="1%"></th>
                                    <th colspan="2" style="background-color: #59aa47;text-align: center;" width="31%">
                                        <p><strong>Επίπεδο 2<br />Μεταβατικό</strong></p>
                                    </th>
                                    <th width="1%"></th>
                                    <th colspan="2" style="background-color: #59aa47;text-align: center;" width="31%">
                                        <p><strong>Επίπεδο 3<br />Προηγμένο</strong></p>
                                    </th>
                                </tr>
                                <tr>
                                    <td width="5%"></td>
                                    <td width="4%"></td>
                                    <td width="27%"></td>
                                    <td width="1%"></td>
                                    <td width="4%"></td>
                                    <td width="27%"></td>
                                    <td width="1%"></td>
                                    <td width="4%"></td>
                                    <td width="27%"></td>
                                </tr>
                                <tr>
                                    <th rowspan="5" width="5%" style="background-color: #59aa47;">
                                        <div id="rotate1" class="rotates"><p><strong>Διακυβέρνηση &amp; Ηγεσία</strong></p></div>
                                    </th>
                                    <td style="background-color: #cbe7c5;text-align: center;">
                                        <p><input type="checkbox" name="check_a1[]" id="check_a11" value="1" onclick="checkrules(1,'check_a1');"></p>
                                    </td>
                                    <td style="background-color: #cbe7c5;">
                                        <p>Η διοίκηση δεν παρέχει στρατηγική στήριξη στις ψηφιακές δράσεις και δεν υπάρχει συγκροτημένη ψηφιακή στρατηγική</p>
                                    </td>
                                    <td></td>
                                    <td style="background-color: #cbe7c5;text-align: center;">
                                        <p><input type="checkbox" name="check_a1[]" id="check_a12" value="2" onclick="checkrules(2,'check_a1');"></p>
                                    </td>
                                    <td style="background-color: #cbe7c5;">
                                        <p>Έχει καθοριστεί η ψηφιακή στρατηγική του οργανισμού, αλλά δεν έχει εφαρμοστεί ακόμα ή εφαρμόζεται εν μέρει</p>
                                    </td>
                                    <td></td>
                                    <td style="background-color: #cbe7c5;text-align: center;">
                                        <p><input type="checkbox" name="check_a1[]" id="check_a13" value="3" onclick="checkrules(3,'check_a1');"></p>
                                    </td>
                                    <td style="background-color: #cbe7c5;">
                                        <p>Η ψηφιακή στρατηγική είναι ενσωματωμένη και δεν διακρίνεται από το οργανωτικό όραμα και τη στρατηγική</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background-color: #91cc84;text-align: center;">
                                        <p><input type="checkbox" name="check_a2[]" id="check_a21" value="1" onclick="checkrules(1,'check_a2');"></p>
                                    </td>
                                    <td style="background-color: #91cc84;">
                                        <p>Η έννοια της ψηφιακής αξίας (value proposition) δεν είναι κατανοητή ή ανεπτυγμένη</p>
                                    </td>
                                    <td></td>
                                    <td style="background-color: #91cc84;text-align: center;">
                                        <p><input type="checkbox" name="check_a2[]" id="check_a22" value="2" onclick="checkrules(2,'check_a2');"></p>
                                    </td>
                                    <td style="background-color: #91cc84;">
                                        <p>Τα οφέλη των ψηφιακών δράσεων είναι σαφώς καθορισμένα, κατανοητά και αναμένεται η υλοποίησή τους</p>
                                    </td>
                                    <td></td>
                                    <td style="background-color: #91cc84;text-align: center;">
                                        <p><input type="checkbox" name="check_a2[]" id="check_a23" value="3" onclick="checkrules(3,'check_a2');"></p>
                                    </td>
                                    <td style="background-color: #91cc84;">
                                        <p>Νέες υπηρεσίες και προϊόντα γεννιούνται ψηφιακά</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background-color: #cbe7c5;text-align: center;">
                                        <p><input type="checkbox" name="check_a3[]" id="check_a31" value="1" onclick="checkrules(1,'check_a3');"></p>
                                    </td>
                                    <td style="background-color: #cbe7c5;">
                                        <p>Οι ευκαιρίες του ψηφιακού μετασχηματισμού δεν είναι κατανοητές ή καθορισμένες</p>
                                    </td>
                                    <td></td>
                                    <td style="background-color: #cbe7c5;text-align: center;">
                                        <p><input type="checkbox" name="check_a3[]" id="check_a32" value="2" onclick="checkrules(2,'check_a3');"></p>
                                    </td>
                                    <td style="background-color: #cbe7c5;">
                                        <p>Υπάρχουν ad hoc ψηφιακά έργα που ξεκίνησαν από εσωτερικές ομάδες και μεμονωμένα άτομα, αλλά δεν εντάσσονται στη στρατηγική του οργανισμού</p>
                                    </td>
                                    <td></td>
                                    <td style="background-color: #cbe7c5;text-align: center;">
                                        <p><input type="checkbox" name="check_a3[]" id="check_a33" value="3" onclick="checkrules(3,'check_a3');"></p>
                                    </td>
                                    <td style="background-color: #cbe7c5;">
                                        <p>Οι μη ψηφιακές υπηρεσίες και τα προϊόντα επανασχεδιάζονται, ενοποιούνται και αναγεννιούνται ως ψηφιακά</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background-color: #91cc84;text-align: center;">
                                        <p><input type="checkbox" name="check_a4[]" id="check_a41" value="1" onclick="checkrules(1,'check_a4');"></p>
                                    </td>
                                    <td style="background-color: #91cc84;">
                                        <p>Διερευνάται ο αντίκτυπος της καινοτομίας και των αναδυόμενων τεχνολογιών στον οργανισμό</p>
                                    </td>
                                    <td></td>
                                    <td style="background-color: #91cc84;text-align: center;">
                                        <p><input type="checkbox" name="check_a4[]" id="check_a42" value="2" onclick="checkrules(2,'check_a4');"></p>
                                    </td>
                                    <td style="background-color: #91cc84;">
                                        <p>Τα οφέλη των αναδυόμενων τεχνολογιών έχουν κατανοηθεί και αναμένεται η υιοθέτησή τους από τον οργανισμό</p>
                                    </td>
                                    <td></td>
                                    <td style="background-color: #91cc84;text-align: center;">
                                        <p><input type="checkbox" name="check_a4[]" id="check_a43" value="3" onclick="checkrules(3,'check_a4');"></p>
                                    </td>
                                    <td style="background-color: #91cc84;">
                                        <p>Ο οργανισμός έχει ενσωματώσει πλήρως τις αναδυόμενες τεχνολογίες στις διαδικασίες του</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background-color: #cbe7c5;text-align: center;">
                                        <p><input type="checkbox" name="check_a5[]" id="check_a51" value="1" onclick="checkrules(1,'check_a5');"></p>
                                    </td>
                                    <td style="background-color: #cbe7c5;">
                                        <p>Η παρουσία στα μέσα κοινωνικής δικτύωσης ή η δέσμευση με τους πολίτες δεν επιτρέπεται στα στελέχη για θέματα του οργανισμού</p>
                                    </td>
                                    <td></td>
                                    <td style="background-color: #cbe7c5;text-align: center;">
                                        <p><input type="checkbox" name="check_a5[]" id="check_a52" value="2" onclick="checkrules(2,'check_a5');"></p>
                                    </td>
                                    <td style="background-color: #cbe7c5;">
                                        <p>Τα οφέλη των μέσων κοινωνικής δικτύωσης γίνονται κατανοητά και ο οργανισμός έχει παρουσία στα μέσα κοινωνικής δικτύωσης</p>
                                    </td>
                                    <td></td>
                                    <td style="background-color: #cbe7c5;text-align: center;">
                                        <p><input type="checkbox" name="check_a5[]" id="check_a53" value="3" onclick="checkrules(3,'check_a5');"></p>
                                    </td>
                                    <td style="background-color: #cbe7c5;">
                                        <p>Ο οργανισμός εστιάζει στους πολίτες και στις ανάγκες του, αξιοποιώντας πολλαπλά ψηφιακά κανάλια επικοινωνίας με τους πολίτες</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
            </div>
            <div class="buttons">
                <a href="#" class="btn" data-set-step="2">Επόμενο</a>
            </div>
        </div>

        <!-- Step 2 - B. Άνθρωποι & Κουλτούρα -->
        <div class="step-content" data-step="2">
        <div class="fields">
                <h2>Άνθρωποι και Κουλτούρα<h2>
                        <p>
                            <b>H κουλτούρα του οργανισμού, συμπεριλαμβανομένης της εστίασης στον πολίτη και την καινοτομία. Η  διάθεση ανάληψης κινδύνου και η προσοχή στη διαχείριση της αλλαγής. Ο ρόλοι και αρμοδιότητες του Ανθρώπινου Δυναμικού.</b>
                            <br /><br />
                            <small>Διαβάστε τα χαρακτηριστικά των 3 επιπέδων ψηφιακής ωριμότητας («1 - Πρώιμο» έως το «3 - Προηγμένο») και για κάθε κριτήριο (δηλαδή για κάθε γραμμή) σημειώστε το χαρακτηριστικό του επιπέδου που θεωρείτε ότι ισχύει για τον οργανισμό σας. Όταν ολοκληρώσετε τις επιλογές σας, πατήστε <b>«Επόμενο»</b>.</small>
                        </p>
                        <table width="100%">
                            <tbody>
                                <tr>
                                    <th width="5%"></th>
                                    <th colspan="2" style="background-color: #59aa47;text-align: center;" width="31%">
                                        <p><strong>Επίπεδο 1<br />Πρώιμο</strong></p>
                                    </th>
                                    <th width="1%"></th>
                                    <th colspan="2" style="background-color: #59aa47;text-align: center;" width="31%">
                                        <p><strong>Επίπεδο 2<br />Μεταβατικό</strong></p>
                                    </th>
                                    <th width="1%"></th>
                                    <th colspan="2" style="background-color: #59aa47;text-align: center;" width="31%">
                                        <p><strong>Επίπεδο 3<br />Προηγμένο</strong></p>
                                    </th>
                                </tr>
                                <tr>
                                    <td width="5%"></td>
                                    <td width="4%"></td>
                                    <td width="27%"></td>
                                    <td width="1%"></td>
                                    <td width="4%"></td>
                                    <td width="27%"></td>
                                    <td width="1%"></td>
                                    <td width="4%"></td>
                                    <td width="27%"></td>
                                </tr>
                                <tr>
                                    <th rowspan="5" width="5%" style="background-color: #59aa47;">
                                        <div id="rotate2" class="rotates"><p><strong>Άνθρωποι &amp; Κουλτούρα</strong></p></div>
                                    </th>
                                    <td style="background-color: #cbe7c5;text-align: center;">
                                        <p><input type="checkbox" name="check_b1[]" id="check_b11" value="1" onclick="checkrules(1,'check_b1');"></p>
                                    </td>
                                    <td style="background-color: #cbe7c5;">
                                        <p>Μικρός αριθμός μελών της ομάδας εμπλέκεται σε έργα ψηφιακού μετασχηματισμού</p>
                                    </td>
                                    <td></td>
                                    <td style="background-color: #cbe7c5;text-align: center;">
                                        <p><input type="checkbox" name="check_b1[]" id="check_b12" value="2" onclick="checkrules(2,'check_b1');"></p>
                                    </td>
                                    <td style="background-color: #cbe7c5;">
                                        <p>Έχει αναπτυχθεί η ψηφιακή στρατηγική  και η ομάδα την έχει αγκαλιάσει</p>
                                    </td>
                                    <td></td>
                                    <td style="background-color: #cbe7c5;text-align: center;">
                                        <p><input type="checkbox" name="check_b1[]" id="check_b13" value="3" onclick="checkrules(3,'check_b1');"></p>
                                    </td>
                                    <td style="background-color: #cbe7c5;">
                                        <p>Όλη η ομάδα είναι ενημερωμένη και κατανοεί τα θέματα ψηφιακού μετασχηματισμού και τα χειρίζεται. Δεν υπάρχει πλέον ανάγκη μιας εξειδικευμένης ομάδας διαχείρισης των ψηφιακών δράσεων</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background-color: #91cc84;text-align: center;">
                                        <p><input type="checkbox" name="check_b2[]" id="check_b21" value="1" onclick="checkrules(1,'check_b2');"></p>
                                    </td>
                                    <td style="background-color: #91cc84;">
                                        <p>Ο οργανισμός δεν εκτιμά ότι χρειάζεται να παρέχει ψηφιακές υπηρεσίες</p>
                                    </td>
                                    <td></td>
                                    <td style="background-color: #91cc84;text-align: center;">
                                        <p><input type="checkbox" name="check_b2[]" id="check_b22" value="2" onclick="checkrules(2,'check_b2');"></p>
                                    </td>
                                    <td style="background-color: #91cc84;">
                                        <p>Υπάρχει επίγνωση της αναγκαιότητας των ψηφιακών υπηρεσιών</p>
                                    </td>
                                    <td></td>
                                    <td style="background-color: #91cc84;text-align: center;">
                                        <p><input type="checkbox" name="check_b2[]" id="check_b23" value="3" onclick="checkrules(3,'check_b2');"></p>
                                    </td>
                                    <td style="background-color: #91cc84;">
                                        <p>Η ψηφιακή κουλτούρα είναι ενσωματωμένη στη συνολική κουλτούρα του οργανισμού και παρακολουθείται συνεχώς, βελτιώνεται και εξειδικεύεται</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background-color: #cbe7c5;text-align: center;">
                                        <p><input type="checkbox" name="check_b3[]" id="check_b31" value="1" onclick="checkrules(1,'check_b3');"></p>
                                    </td>
                                    <td style="background-color: #cbe7c5;">
                                        <p>Ο οργανισμός είναι απρόθυμος να λαμβάνει ρίσκα και υπάρχει σημαντική αντίσταση στον ψηφιακό μετασχηματισμό</p>
                                    </td>
                                    <td></td>
                                    <td style="background-color: #cbe7c5;text-align: center;">
                                        <p><input type="checkbox" name="check_b3[]" id="check_b32" value="2" onclick="checkrules(2,'check_b3');"></p>
                                    </td>
                                    <td style="background-color: #cbe7c5;">
                                        <p>Έχει αναπτυχθεί σχέδιο διαχείρισης αλλαγών  για τις ανάγκες του ψηφιακού μετασχηματισμού του οργανισμού το οποίο αναμένεται να εφαρμοστεί</p>
                                    </td>
                                    <td></td>
                                    <td style="background-color: #cbe7c5;text-align: center;">
                                        <p><input type="checkbox" name="check_b3[]" id="check_b33" value="3" onclick="checkrules(3,'check_b3');"></p>
                                    </td>
                                    <td style="background-color: #cbe7c5;">
                                        <p>Η ομάδα δημιουργεί και διερευνά προληπτικά τρόπους βελτίωσης της παροχής ψηφιακών υπηρεσιών και της βελτίωσης της εσωτερικής παραγωγικότητας μέσω της υιοθέτησης ψηφιακών λύσεων</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background-color: #91cc84;text-align: center;">
                                        <p><input type="checkbox" name="check_b4[]" id="check_b41" value="1" onclick="checkrules(1,'check_b4');"></p>
                                    </td>
                                    <td style="background-color: #91cc84;">
                                        <p>Υπάρχει  περιορισμένη ή καθόλου προσπάθεια κατανόησης των αναγκών των πολιτών</p>
                                    </td>
                                    <td></td>
                                    <td style="background-color: #91cc84;text-align: center;">
                                        <p><input type="checkbox" name="check_b4[]" id="check_b42" value="2" onclick="checkrules(2,'check_b4');"></p>
                                    </td>
                                    <td style="background-color: #91cc84;">
                                        <p>Ο σχεδιασμός των υπηρεσιών εστιάζει στους πολίτες και στον τρόπο με τον οποίο η ψηφιακή τεχνολογία μπορεί να καλύψει τις ανάγκες τους</p>
                                    </td>
                                    <td></td>
                                    <td style="background-color: #91cc84;text-align: center;">
                                        <p><input type="checkbox" name="check_b4[]" id="check_b43" value="3" onclick="checkrules(3,'check_b4');"></p>
                                    </td>
                                    <td style="background-color: #91cc84;">
                                        <p>Η οργάνωση του οργανισμού και των ομάδων εργασίας  γίνεται γύρω από τις ανάγκες των πολιτών και όχι με βάσει τις απαιτήσεις  του οργανισμού και τις παρεχόμενες υπηρεσίες (γραφειοκρατία)</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background-color: #cbe7c5;text-align: center;">
                                        <p><input type="checkbox" name="check_b5[]" id="check_b51" value="1" onclick="checkrules(1,'check_b5');"></p>
                                    </td>
                                    <td style="background-color: #cbe7c5;">
                                        <p>Φόβος εμπλοκής με τα μέσα κοινωνικής δικτύωσης και χρήσης των μέσων κοινωνικής δικτύωσης από την ομάδα</p>
                                    </td>
                                    <td></td>
                                    <td style="background-color: #cbe7c5;text-align: center;">
                                        <p><input type="checkbox" name="check_b5[]" id="check_b52" value="2" onclick="checkrules(2,'check_b5');"></p>
                                    </td>
                                    <td style="background-color: #cbe7c5;">
                                        <p>Ο οργανισμός χρησιμοποιεί τα μέσα κοινωνικής δικτύωσης μόνο για την προβολή πληροφοριών</p>
                                    </td>
                                    <td></td>
                                    <td style="background-color: #cbe7c5;text-align: center;">
                                        <p><input type="checkbox" name="check_b5[]" id="check_b53" value="3" onclick="checkrules(3,'check_b5');"></p>
                                    </td>
                                    <td style="background-color: #cbe7c5;">
                                        <p>Ο οργανισμός χρησιμοποιεί τα μέσα κοινωνικής δικτύωσης για την άμεση επικοινωνία και αλληλεπίδραση με τους πολίτες, λαμβάνοντας υπόψη την ανατροφοδότηση και τα σχόλια τους</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
            </div>
            <div class="buttons">
                <a href="#" class="btn alt" data-set-step="1">Προηγούμενο</a>
                <a href="#" class="btn" data-set-step="3">Επόμενο</a>
            </div>
        </div>

        <!-- Step 3 - C. Δυναμικότητα & Ικανότητα -->
        <div class="step-content" data-step="3">
        <div class="fields">
                <h2>Δυναμικότητα και Ικανότητα<h2>
                        <p>
                            <b>Η ικανότητα του οργανισμού να είναι ψηφιακά ώριμος. Πόροι, προσωπικό και δεξιότητες, πρόσβαση στην κατάλληλη τεχνολογία, σχέδιο εκπαίδευσης, υποστηρικτικές πολιτικές και διαδικασίες.</b>
                            <br /><br />
                            <small>Διαβάστε τα χαρακτηριστικά των 3 επιπέδων ψηφιακής ωριμότητας («1 - Πρώιμο» έως το «3 - Προηγμένο») και για κάθε κριτήριο (δηλαδή για κάθε γραμμή) σημειώστε το χαρακτηριστικό του επιπέδου που θεωρείτε ότι ισχύει για τον οργανισμό σας. Όταν ολοκληρώσετε τις επιλογές σας, πατήστε <b>«Επόμενο»</b>.</small>
                        </p>
                        <table width="100%">
                            <tbody>
                                <tr>
                                    <th width="5%"></th>
                                    <th colspan="2" style="background-color: #59aa47;text-align: center;" width="31%">
                                        <p><strong>Επίπεδο 1<br />Πρώιμο</strong></p>
                                    </th>
                                    <th width="1%"></th>
                                    <th colspan="2" style="background-color: #59aa47;text-align: center;" width="31%">
                                        <p><strong>Επίπεδο 2<br />Μεταβατικό</strong></p>
                                    </th>
                                    <th width="1%"></th>
                                    <th colspan="2" style="background-color: #59aa47;text-align: center;" width="31%">
                                        <p><strong>Επίπεδο 3<br />Προηγμένο</strong></p>
                                    </th>
                                </tr>
                                <tr>
                                    <td width="5%"></td>
                                    <td width="4%"></td>
                                    <td width="27%"></td>
                                    <td width="1%"></td>
                                    <td width="4%"></td>
                                    <td width="27%"></td>
                                    <td width="1%"></td>
                                    <td width="4%"></td>
                                    <td width="27%"></td>
                                </tr>
                                <tr>
                                    <th rowspan="5" width="5%" style="background-color: #59aa47;">
                                        <div id="rotate3" class="rotates"><p><strong>Δυναμικότητα &amp; Ικανότητα</strong></p></div>
                                    </th>
                                    <td style="background-color: #cbe7c5;text-align: center;">
                                        <p><input type="checkbox" name="check_c1[]" id="check_c11" value="1" onclick="checkrules(1,'check_c1');"></p>
                                    </td>
                                    <td style="background-color: #cbe7c5;">
                                        <p>Καμία ή ελάχιστη προσπάθεια ανάπτυξης και τεκμηρίωσης ψηφιακών πολιτικών και διαδικασιών</p>
                                    </td>
                                    <td></td>
                                    <td style="background-color: #cbe7c5;text-align: center;">
                                        <p><input type="checkbox" name="check_c1[]" id="check_c12" value="2" onclick="checkrules(2,'check_c1');"></p>
                                    </td>
                                    <td style="background-color: #cbe7c5;">
                                        <p>Έχουν προσδιοριστεί και αναπτυχθεί βασικές ψηφιακές πολιτικές και διαδικασίες</p>
                                    </td>
                                    <td></td>
                                    <td style="background-color: #cbe7c5;text-align: center;">
                                        <p><input type="checkbox" name="check_c1[]" id="check_c13" value="3" onclick="checkrules(3,'check_c1');"></p>
                                    </td>
                                    <td style="background-color: #cbe7c5;">
                                        <p>Όλες οι ψηφιακές πολιτικές, διαδικασίες και ψηφιακές δραστηριότητες έχουν τεθεί σε εφαρμογή και αποτελούν τον πυρήνα της καθημερινής δραστηριότητας</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background-color: #91cc84;text-align: center;">
                                        <p><input type="checkbox" name="check_c2[]" id="check_c21" value="1" onclick="checkrules(1,'check_c2');"></p>
                                    </td>
                                    <td style="background-color: #91cc84;">
                                        <p>Ελάχιστη ή καθόλου διάθεση κονδυλίων για την ψηφιακή τεχνολογία</p>
                                    </td>
                                    <td></td>
                                    <td style="background-color: #91cc84;text-align: center;">
                                        <p><input type="checkbox" name="check_c2[]" id="check_c22" value="2" onclick="checkrules(2,'check_c2');"></p>
                                    </td>
                                    <td style="background-color: #91cc84;">
                                        <p>Ψηφιακός προϋπολογισμός κατάλληλος για τις τρέχουσες ανάγκες</p>
                                    </td>
                                    <td></td>
                                    <td style="background-color: #91cc84;text-align: center;">
                                        <p><input type="checkbox" name="check_c2[]" id="check_c23" value="3" onclick="checkrules(3,'check_c2');"></p>
                                    </td>
                                    <td style="background-color: #91cc84;">
                                        <p>Οι πόροι και οι προϋπολογισμοί είναι κατάλληλοι για την υποστήριξη των ψηφιακών εργαλείων, δραστηριοτήτων και παροχής υπηρεσιών</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background-color: #cbe7c5;text-align: center;">
                                        <p><input type="checkbox" name="check_c3[]" id="check_c31" value="1" onclick="checkrules(1,'check_c3');"></p>
                                    </td>
                                    <td style="background-color: #cbe7c5;">
                                        <p>Περιορισμένη ευαισθητοποίηση του προσωπικού και των πελατών για τα οφέλη των ψηφιακών καναλιών</p>
                                    </td>
                                    <td></td>
                                    <td style="background-color: #cbe7c5;text-align: center;">
                                        <p><input type="checkbox" name="check_c3[]" id="check_c32" value="2" onclick="checkrules(2,'check_c3');"></p>
                                    </td>
                                    <td style="background-color: #cbe7c5;">
                                        <p>Προσδιορίζονται και επιδιώκονται τα οφέλη από την υιοθέτηση ψηφιακών λύσεων για την παραγωγικότητα του προσωπικού</p>
                                    </td>
                                    <td></td>
                                    <td style="background-color: #cbe7c5;text-align: center;">
                                        <p><input type="checkbox" name="check_c3[]" id="check_c33" value="3" onclick="checkrules(3,'check_c3');"></p>
                                    </td>
                                    <td style="background-color: #cbe7c5;">
                                        <p>Η ψηφιακή τεχνολογία είναι πλήρως ενσωματωμένη στα οργανωτικά σχέδια και στον κύκλο αναθεώρησης του οργανισμού</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background-color: #91cc84;text-align: center;">
                                        <p><input type="checkbox" name="check_c4[]" id="check_c41" value="1" onclick="checkrules(1,'check_c4');"></p>
                                    </td>
                                    <td style="background-color: #91cc84;">
                                        <p>Καμία κατάρτιση του προσωπικού στη χρήση των ψηφιακών εργαλείων </p>
                                    </td>
                                    <td></td>
                                    <td style="background-color: #91cc84;text-align: center;">
                                        <p><input type="checkbox" name="check_c4[]" id="check_c42" value="2" onclick="checkrules(2,'check_c4');"></p>
                                    </td>
                                    <td style="background-color: #91cc84;">
                                        <p>Κάποια εκπαίδευση του προσωπικού στη χρήση των ψηφιακών εργαλείων και των μέσων κοινωνικής δικτύωσης του οργανισμού</p>
                                    </td>
                                    <td></td>
                                    <td style="background-color: #91cc84;text-align: center;">
                                        <p><input type="checkbox" name="check_c4[]" id="check_c43" value="3" onclick="checkrules(3,'check_c4');"></p>
                                    </td>
                                    <td style="background-color: #91cc84;">
                                        <p>Η κατάρτιση του προσωπικού υποστηρίζει την τρέχουσα ψηφιακή στρατηγική και προβλέπει τις μελλοντικές απαιτήσεις δεξιοτήτων και γνώσεων</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background-color: #cbe7c5;text-align: center;">
                                        <p><input type="checkbox" name="check_c5[]" id="check_c51" value="1" onclick="checkrules(1,'check_c5');"></p>
                                    </td>
                                    <td style="background-color: #cbe7c5;">
                                        <p>Καμία προσπάθεια ανασχεδιασμού της παροχής υπηρεσιών και των σχετικών επιχειρηματικών πρακτικών για την αξιοποίηση της ψηφιακής παροχής υπηρεσιών</p>
                                    </td>
                                    <td></td>
                                    <td style="background-color: #cbe7c5;text-align: center;">
                                        <p><input type="checkbox" name="check_c5[]" id="check_c52" value="2" onclick="checkrules(2,'check_c5');"></p>
                                    </td>
                                    <td style="background-color: #cbe7c5;">
                                        <p>Είναι προγραμματισμένος ο ανασχεδιασμός των υπηρεσιών σε ψηφιακές στρατηγικές</p>
                                    </td>
                                    <td></td>
                                    <td style="background-color: #cbe7c5;text-align: center;">
                                        <p><input type="checkbox" name="check_c5[]" id="check_c53" value="3" onclick="checkrules(3,'check_c5');"></p>
                                    </td>
                                    <td style="background-color: #cbe7c5;">
                                        <p>Έχουν προσδιοριστεί και αναπτυχθεί όλες οι ψηφιακές πολιτικές και διαδικασίες</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
            </div>
            <div class="buttons">
                <a href="#" class="btn alt" data-set-step="2">Προηγούμενο</a>
                <a href="#" class="btn" data-set-step="4">Επόμενο</a>
            </div>
        </div>

        <!-- Step 4 - D. Καινοτομία -->
        <div class="step-content" data-step="4">
        <div class="fields">
                <h2>Καινοτομία<h2>
                        <p>
                            <b>Η προθυμία και η ικανότητα να υιοθετηθούν νέες υπηρεσίες και προϊόντα, καθώς και νέοι τρόποι παροχής υπηρεσιών. Επίπεδο ετοιμότητας για αξιολόγηση και υλοποίηση νέων τεχνολογιών, επιχειρηματικών διαδικασιών και τρόπων εργασίας.</b>
                            <br /><br />
                            <small>Διαβάστε τα χαρακτηριστικά των 3 επιπέδων ψηφιακής ωριμότητας («1 - Πρώιμο» έως το «3 - Προηγμένο») και για κάθε κριτήριο (δηλαδή για κάθε γραμμή) σημειώστε το χαρακτηριστικό του επιπέδου που θεωρείτε ότι ισχύει για τον οργανισμό σας. Όταν ολοκληρώσετε τις επιλογές σας, πατήστε <b>«Επόμενο»</b>.</small>
                        </p>
                        <table width="100%">
                            <tbody>
                                <tr>
                                    <th width="5%"></th>
                                    <th colspan="2" style="background-color: #59aa47;text-align: center;" width="31%">
                                        <p><strong>Επίπεδο 1<br />Πρώιμο</strong></p>
                                    </th>
                                    <th width="1%"></th>
                                    <th colspan="2" style="background-color: #59aa47;text-align: center;" width="31%">
                                        <p><strong>Επίπεδο 2<br />Μεταβατικό</strong></p>
                                    </th>
                                    <th width="1%"></th>
                                    <th colspan="2" style="background-color: #59aa47;text-align: center;" width="31%">
                                        <p><strong>Επίπεδο 3<br />Προηγμένο</strong></p>
                                    </th>
                                </tr>
                                <tr>
                                    <td width="5%"></td>
                                    <td width="4%"></td>
                                    <td width="27%"></td>
                                    <td width="1%"></td>
                                    <td width="4%"></td>
                                    <td width="27%"></td>
                                    <td width="1%"></td>
                                    <td width="4%"></td>
                                    <td width="27%"></td>
                                </tr>
                                <tr>
                                    <th rowspan="5" width="5%" style="background-color: #59aa47;">
                                        <div id="rotate4" class="rotates"><p><strong>Καινοτομία</strong></p></div>
                                    </th>
                                    <td style="background-color: #cbe7c5;text-align: center;">
                                        <p><input type="checkbox" name="check_d1[]" id="check_d11" value="1" onclick="checkrules(1,'check_d1');"></p>
                                    </td>
                                    <td style="background-color: #cbe7c5;">
                                        <p>Ο οργανισμός εξετάζει τη δυνατότητα καινοτομικών προσεγγίσεων, αλλά δεν έχει συγκεκριμένη στρατηγική</p>
                                    </td>
                                    <td></td>
                                    <td style="background-color: #cbe7c5;text-align: center;">
                                        <p><input type="checkbox" name="check_d1[]" id="check_d12" value="2" onclick="checkrules(2,'check_d1');"></p>
                                    </td>
                                    <td style="background-color: #cbe7c5;">
                                        <p>Συγκεκριμένη στρατηγική καινοτομίας εφαρμόζεται σε κρίσιμους τομείς</p>
                                    </td>
                                    <td></td>
                                    <td style="background-color: #cbe7c5;text-align: center;">
                                        <p><input type="checkbox" name="check_d1[]" id="check_d13" value="3" onclick="checkrules(3,'check_d1');"></p>
                                    </td>
                                    <td style="background-color: #cbe7c5;">
                                        <p>Ο οργανισμός ηγείται σε καινοτόμες πρακτικές, χρησιμοποιώντας προηγμένες τεχνολογίες</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background-color: #91cc84;text-align: center;">
                                        <p><input type="checkbox" name="check_d2[]" id="check_d21" value="1" onclick="checkrules(1,'check_d2');"></p>
                                    </td>
                                    <td style="background-color: #91cc84;">
                                        <p>Βασική παρουσία σε ψηφιακά μέσα, αλλά ακόμη χρειάζεται ανάπτυξη για ενεργή επικοινωνία</p>
                                    </td>
                                    <td></td>
                                    <td style="background-color: #91cc84;text-align: center;">
                                        <p><input type="checkbox" name="check_d2[]" id="check_d22" value="2" onclick="checkrules(2,'check_d2');"></p>
                                    </td>
                                    <td style="background-color: #91cc84;">
                                        <p>Γίνονται προσπάθειες για τη βελτίωση της ψηφιακής παρουσίας και των εργαλείων επικοινωνίας του οργανισμού</p>
                                    </td>
                                    <td></td>
                                    <td style="background-color: #91cc84;text-align: center;">
                                        <p><input type="checkbox" name="check_d2[]" id="check_d23" value="3" onclick="checkrules(3,'check_d2');"></p>
                                    </td>
                                    <td style="background-color: #91cc84;">
                                        <p>Εξειδικευμένη και αποτελεσματική ψηφιακή επικοινωνία με τους πολίτες</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background-color: #cbe7c5;text-align: center;">
                                        <p><input type="checkbox" name="check_d3[]" id="check_d31" value="1" onclick="checkrules(1,'check_d3');"></p>
                                    </td>
                                    <td style="background-color: #cbe7c5;">
                                        <p>Βασικά βήματα προς τη βελτίωση της διαλειτουργικότητας έχουν αρχίσει να υλοποιούνται</p>
                                    </td>
                                    <td></td>
                                    <td style="background-color: #cbe7c5;text-align: center;">
                                        <p><input type="checkbox" name="check_d3[]" id="check_d32" value="2" onclick="checkrules(2,'check_d3');"></p>
                                    </td>
                                    <td style="background-color: #cbe7c5;">
                                        <p>Ο οργανισμός προχωρά προς μια πιο διαλειτουργική δομή, με στόχο τη σύνδεση διαφορετικών συστημάτων</p>
                                    </td>
                                    <td></td>
                                    <td style="background-color: #cbe7c5;text-align: center;">
                                        <p><input type="checkbox" name="check_d3[]" id="check_d33" value="3" onclick="checkrules(3,'check_d3');"></p>
                                    </td>
                                    <td style="background-color: #cbe7c5;">
                                        <p>Τα συστήματα είναι πλήρως διαλειτουργικά, διευκολύνοντας την απρόσκοπτη επικοινωνία</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background-color: #91cc84;text-align: center;">
                                        <p><input type="checkbox" name="check_d4[]" id="check_d41" value="1" onclick="checkrules(1,'check_d4');"></p>
                                    </td>
                                    <td style="background-color: #91cc84;">
                                        <p>Δεν εφαρμόζονται μέτρα ασφάλειας των ψηφιακών πόρων και δεδομένων</p>
                                    </td>
                                    <td></td>
                                    <td style="background-color: #91cc84;text-align: center;">
                                        <p><input type="checkbox" name="check_d4[]" id="check_d42" value="2" onclick="checkrules(2,'check_d4');"></p>
                                    </td>
                                    <td style="background-color: #91cc84;">
                                        <p>Μερικά μέτρα ασφαλείας έχουν εφαρμοστεί, αλλά υπάρχει ανάγκη για συνεχείς βελτιώσεις</p>
                                    </td>
                                    <td></td>
                                    <td style="background-color: #91cc84;text-align: center;">
                                        <p><input type="checkbox" name="check_d4[]" id="check_d43" value="3" onclick="checkrules(3,'check_d4');"></p>
                                    </td>
                                    <td style="background-color: #91cc84;">
                                        <p>Προηγμένες τεχνικές ασφαλείας εφαρμόζονται για προστασία των ψηφιακών πόρων και δεδομένων</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background-color: #cbe7c5;text-align: center;">
                                        <p><input type="checkbox" name="check_d5[]" id="check_d51" value="1" onclick="checkrules(1,'check_d5');"></p>
                                    </td>
                                    <td style="background-color: #cbe7c5;">
                                        <p>Δεν υπάρχει ενσωμάτωση της Τεχνητής Νοημοσύνης, αλλά γίνεται εξέταση για μελλοντικές εφαρμογές</p>
                                    </td>
                                    <td></td>
                                    <td style="background-color: #cbe7c5;text-align: center;">
                                        <p><input type="checkbox" name="check_d5[]" id="check_d52" value="2" onclick="checkrules(2,'check_d5');"></p>
                                    </td>
                                    <td style="background-color: #cbe7c5;">
                                        <p>Η Τεχνητή Νοημοσύνη χρησιμοποιείται σε συγκεκριμένους τομείς, με ανάγκη επέκτασης</p>
                                    </td>
                                    <td></td>
                                    <td style="background-color: #cbe7c5;text-align: center;">
                                        <p><input type="checkbox" name="check_d5[]" id="check_d53" value="3" onclick="checkrules(3,'check_d5');"></p>
                                    </td>
                                    <td style="background-color: #cbe7c5;">
                                        <p>Η Τεχνητή Νοημοσύνη ενσωματώνεται εκτενώς σε πολλούς τομείς, προωθώντας την καινοτομία</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
            </div>
            <div class="buttons">
                <a href="#" class="btn alt" data-set-step="3">Προηγούμενο</a>
                <a href="#" class="btn" data-set-step="5">Επόμενο</a>
            </div>
        </div>        

        <!-- Step 5 - E. Τεχνολογία -->
        <div class="step-content" data-step="5">
        <div class="fields">
                <h2>Τεχνολογία<h2>
                        <p>
                            <b>Η καταλληλότητα των υποκείμενων τεχνολογικών πλατφορμών, προγραμμάτων και συστημάτων που υποστηρίζουν τους άλλους τέσσερις πυλώνες.</b>
                            <br /><br />
                            <small>Διαβάστε τα χαρακτηριστικά των 3 επιπέδων ψηφιακής ωριμότητας («1 - Πρώιμο» έως το «3 - Προηγμένο») και για κάθε κριτήριο (δηλαδή για κάθε γραμμή) σημειώστε το χαρακτηριστικό του επιπέδου που θεωρείτε ότι ισχύει για τον οργανισμό σας. Όταν ολοκληρώσετε τις επιλογές σας, πατήστε <b>«Επόμενο»</b>.</small>
                        </p>
                        <table width="100%">
                            <tbody>
                                <tr>
                                    <th width="5%"></th>
                                    <th colspan="2" style="background-color: #59aa47;text-align: center;" width="31%">
                                        <p><strong>Επίπεδο 1<br />Πρώιμο</strong></p>
                                    </th>
                                    <th width="1%"></th>
                                    <th colspan="2" style="background-color: #59aa47;text-align: center;" width="31%">
                                        <p><strong>Επίπεδο 2<br />Μεταβατικό</strong></p>
                                    </th>
                                    <th width="1%"></th>
                                    <th colspan="2" style="background-color: #59aa47;text-align: center;" width="31%">
                                        <p><strong>Επίπεδο 3<br />Προηγμένο</strong></p>
                                    </th>
                                </tr>
                                <tr>
                                    <td width="5%"></td>
                                    <td width="4%"></td>
                                    <td width="27%"></td>
                                    <td width="1%"></td>
                                    <td width="4%"></td>
                                    <td width="27%"></td>
                                    <td width="1%"></td>
                                    <td width="4%"></td>
                                    <td width="27%"></td>
                                </tr>
                                <tr>
                                    <th rowspan="5" width="5%" style="background-color: #59aa47;">
                                        <div id="rotate5" class="rotates"><p><strong>Τεχνολογία</strong></p></div>
                                    </th>
                                    <td style="background-color: #cbe7c5;text-align: center;">
                                        <p><input type="checkbox" name="check_e1[]" id="check_e11" value="1" onclick="checkrules(1,'check_e1');"></p>
                                    </td>
                                    <td style="background-color: #cbe7c5;">
                                        <p>Ο οργανισμός αναγνωρίζει την ανάγκη για επιλογή κατάλληλων τεχνολογικών πλατφορμών, αλλά αυτή η διαδικασία είναι στα πρώτα στάδια</p>
                                    </td>
                                    <td></td>
                                    <td style="background-color: #cbe7c5;text-align: center;">
                                        <p><input type="checkbox" name="check_e1[]" id="check_e12" value="2" onclick="checkrules(2,'check_e1');"></p>
                                    </td>
                                    <td style="background-color: #cbe7c5;">
                                        <p>Βασική υποστήριξη ΤΠΕ για την ψηφιακή στρατηγική</p>
                                    </td>
                                    <td></td>
                                    <td style="background-color: #cbe7c5;text-align: center;">
                                        <p><input type="checkbox" name="check_e1[]" id="check_e13" value="3" onclick="checkrules(3,'check_e1');"></p>
                                    </td>
                                    <td style="background-color: #cbe7c5;">
                                        <p>Η στρατηγική και τα συστήματα ΤΠΕ είναι ευθυγραμμισμένα με την ψηφιακή στρατηγική</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background-color: #91cc84;text-align: center;">
                                        <p><input type="checkbox" name="check_e2[]" id="check_e21" value="1" onclick="checkrules(1,'check_e2');"></p>
                                    </td>
                                    <td style="background-color: #91cc84;">
                                        <p>Δεν υπάρχει ή δεν είναι επαρκώς καθορισμένη στρατηγική ΤΠΕ</p>
                                    </td>
                                    <td></td>
                                    <td style="background-color: #91cc84;text-align: center;">
                                        <p><input type="checkbox" name="check_e2[]" id="check_e22" value="2" onclick="checkrules(2,'check_e2');"></p>
                                    </td>
                                    <td style="background-color: #91cc84;">
                                        <p>Έμφαση δίνεται στις λύσεις ΤΠΕ για την υπηρεσία και όχι στα ψηφιακά κανάλια ή/και στις ανάγκες των τελικών χρηστών</p>
                                    </td>
                                    <td></td>
                                    <td style="background-color: #91cc84;text-align: center;">
                                        <p><input type="checkbox" name="check_e2[]" id="check_e23" value="3" onclick="checkrules(3,'check_e2');"></p>
                                    </td>
                                    <td style="background-color: #91cc84;">
                                        <p>Η συμβολή των ΤΠΕ διασφαλίζει ότι οι ψηφιακές υπηρεσίες ανταποκρίνονται στις ανάγκες των χρηστών και συμμορφώνονται με τα πρότυπα προσβασιμότητας</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background-color: #cbe7c5;text-align: center;">
                                        <p><input type="checkbox" name="check_e3[]" id="check_e31" value="1" onclick="checkrules(1,'check_e3');"></p>
                                    </td>
                                    <td style="background-color: #cbe7c5;">
                                        <p>Καμία ενσωμάτωση των ψηφιακών καναλιών με τις επιχειρησιακές διαδικασίες ή τα συστήματα του οργανισμού</p>
                                    </td>
                                    <td></td>
                                    <td style="background-color: #cbe7c5;text-align: center;">
                                        <p><input type="checkbox" name="check_e3[]" id="check_e32" value="2" onclick="checkrules(2,'check_e3');"></p>
                                    </td>
                                    <td style="background-color: #cbe7c5;">
                                        <p>Κάποια ενσωμάτωση των ψηφιακών καναλιών με τις επιχειρηματικές διαδικασίες, τα συστήματα και την στρατηγική επικοινωνίας</p>
                                    </td>
                                    <td></td>
                                    <td style="background-color: #cbe7c5;text-align: center;">
                                        <p><input type="checkbox" name="check_e3[]" id="check_e33" value="3" onclick="checkrules(3,'check_e3');"></p>
                                    </td>
                                    <td style="background-color: #cbe7c5;">
                                        <p>Οι επιχειρησιακές διαδικασίες και τα συστήματα ΤΠΕ καθοδηγούνται από τα ψηφιακά κανάλια και τις ανάγκες των τελικών χρηστών</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background-color: #91cc84;text-align: center;">
                                        <p><input type="checkbox" name="check_e4[]" id="check_e41" value="1" onclick="checkrules(1,'check_e4');"></p>
                                    </td>
                                    <td style="background-color: #91cc84;">
                                        <p>Τα υπάρχοντα συστήματα είναι βασικά και εξυπηρετούν τις αρχικές ανάγκες, αλλά απαιτούν εξέλιξη</p>
                                    </td>
                                    <td></td>
                                    <td style="background-color: #91cc84;text-align: center;">
                                        <p><input type="checkbox" name="check_e4[]" id="check_e42" value="2" onclick="checkrules(2,'check_e4');"></p>
                                    </td>
                                    <td style="background-color: #91cc84;">
                                        <p>Τα επιλεγμένα συστήματα είναι σχετικά διαλειτουργικά, αλλά απαιτούνται περαιτέρω προσπάθειες</p>
                                    </td>
                                    <td></td>
                                    <td style="background-color: #91cc84;text-align: center;">
                                        <p><input type="checkbox" name="check_e4[]" id="check_e43" value="3" onclick="checkrules(3,'check_e4');"></p>
                                    </td>
                                    <td style="background-color: #91cc84;">
                                        <p>Τα συστήματα είναι πλήρως διαλειτουργικά, παρέχοντας συνολική υποστήριξη</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background-color: #cbe7c5;text-align: center;">
                                        <p><input type="checkbox" name="check_e5[]" id="check_e51" value="1" onclick="checkrules(1,'check_e5');"></p>
                                    </td>
                                    <td style="background-color: #cbe7c5;">
                                        <p>Οι επικοινωνιακές υποδομές είναι περιορισμένες σε βασικές λειτουργίες, με απλά δίκτυα και βασικές υπηρεσίες</p>
                                    </td>
                                    <td></td>
                                    <td style="background-color: #cbe7c5;text-align: center;">
                                        <p><input type="checkbox" name="check_e5[]" id="check_e52" value="2" onclick="checkrules(2,'check_e5');"></p>
                                    </td>
                                    <td style="background-color: #cbe7c5;">
                                        <p>Οι υποδομές δικτύωσης εξελίσσονται προς πιο προηγμένες τεχνολογίες και επεκτείνονται σε υπηρεσίες Cloud</p>
                                    </td>
                                    <td></td>
                                    <td style="background-color: #cbe7c5;text-align: center;">
                                        <p><input type="checkbox" name="check_e5[]" id="check_e53" value="3" onclick="checkrules(3,'check_e5');"></p>
                                    </td>
                                    <td style="background-color: #cbe7c5;">
                                        <p>Οι υποδομές δικτύωσης είναι σύγχρονες και ευέλικτες, υποστηρίζοντας προηγμένες τεχνολογίες όπως 5G και Edge Computing. Η ασφάλεια δικτύου είναι υψηλού επιπέδου και υπάρχει ενεργή διαχείριση εύρους ζώνης</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
            </div>
            <div class="buttons">
                <a href="#" class="btn alt" data-set-step="4">Προηγούμενο</a>
                <a href="#" class="btn" data-set-step="6">Επόμενο</a>
            </div>
        </div> 

        <!-- Step 6 - F. Πράσινη Μετάβαση -->
        <div class="step-content" data-step="6">
        <div class="fields">
                <h2>Πράσινη Μετάβαση<h2>
                        <p>
                            <b>Η καταλληλότητα των υποκείμενων τεχνολογικών πλατφορμών, προγραμμάτων και συστημάτων που υποστηρίζουν τους άλλους τέσσερις πυλώνες.</b>
                            <br /><br />
                            <small>Διαβάστε τα χαρακτηριστικά των 3 επιπέδων ψηφιακής ωριμότητας («1 - Πρώιμο» έως το «3 - Προηγμένο») και για κάθε κριτήριο (δηλαδή για κάθε γραμμή) σημειώστε το χαρακτηριστικό του επιπέδου που θεωρείτε ότι ισχύει για τον οργανισμό σας. Όταν ολοκληρώσετε τις επιλογές σας, πατήστε <b>«Επόμενο»</b>.</small>
                        </p>
                        <table width="100%">
                            <tbody>
                                <tr>
                                    <th width="5%"></th>
                                    <th colspan="2" style="background-color: #59aa47;text-align: center;" width="31%">
                                        <p><strong>Επίπεδο 1<br />Πρώιμο</strong></p>
                                    </th>
                                    <th width="1%"></th>
                                    <th colspan="2" style="background-color: #59aa47;text-align: center;" width="31%">
                                        <p><strong>Επίπεδο 2<br />Μεταβατικό</strong></p>
                                    </th>
                                    <th width="1%"></th>
                                    <th colspan="2" style="background-color: #59aa47;text-align: center;" width="31%">
                                        <p><strong>Επίπεδο 3<br />Προηγμένο</strong></p>
                                    </th>
                                </tr>
                                <tr>
                                    <td width="5%"></td>
                                    <td width="4%"></td>
                                    <td width="27%"></td>
                                    <td width="1%"></td>
                                    <td width="4%"></td>
                                    <td width="27%"></td>
                                    <td width="1%"></td>
                                    <td width="4%"></td>
                                    <td width="27%"></td>
                                </tr>
                                <tr>
                                    <th rowspan="5" width="5%" style="background-color: #59aa47;">
                                        <div id="rotate6" class="rotates"><p><strong>Πράσινη Μετάβαση</strong></p></div>
                                    </th>
                                    <td style="background-color: #cbe7c5;text-align: center;">
                                        <p><input type="checkbox" name="check_f1[]" id="check_f11" value="1" onclick="checkrules(1,'check_f1');"></p>
                                    </td>
                                    <td style="background-color: #cbe7c5;">
                                        <p>Η περιβαλλοντική βιωσιμότητα δεν έχει ενταχθεί στην στρατηγική του οργανισμού</p>
                                    </td>
                                    <td></td>
                                    <td style="background-color: #cbe7c5;text-align: center;">
                                        <p><input type="checkbox" name="check_f1[]" id="check_f12" value="2" onclick="checkrules(2,'check_f1');"></p>
                                    </td>
                                    <td style="background-color: #cbe7c5;">
                                        <p>Πρόκειται να υιοθετηθούν περιβαλλοντικά πρότυπα στην ψηφιακή στρατηγική του οργανισμού</p>
                                    </td>
                                    <td></td>
                                    <td style="background-color: #cbe7c5;text-align: center;">
                                        <p><input type="checkbox" name="check_f1[]" id="check_f13" value="3" onclick="checkrules(3,'check_f1');"></p>
                                    </td>
                                    <td style="background-color: #cbe7c5;">
                                        <p>Οι περιβαλλοντικές ανησυχίες και τα περιβαλλοντικά πρότυπα ενσωματώνονται στην ψηφιακή στρατηγική του οργανισμού</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background-color: #91cc84;text-align: center;">
                                        <p><input type="checkbox" name="check_f2[]" id="check_f21" value="1" onclick="checkrules(1,'check_f2');"></p>
                                    </td>
                                    <td style="background-color: #91cc84;">
                                        <p>Ο οργανισμός δεν διαθέτει πρόγραμμα ανακύκλωσης του παλαιού τεχνολογικού εξοπλισμού</p>
                                    </td>
                                    <td></td>
                                    <td style="background-color: #91cc84;text-align: center;">
                                        <p><input type="checkbox" name="check_f2[]" id="check_f22" value="2" onclick="checkrules(2,'check_f2');"></p>
                                    </td>
                                    <td style="background-color: #91cc84;">
                                        <p>Ο οργανισμός κατά καιρούς ανακυκλώνει/ επαναχρησιμοποιεί τον παλαιό τεχνολογικό εξοπλισμό</p>
                                    </td>
                                    <td></td>
                                    <td style="background-color: #91cc84;text-align: center;">
                                        <p><input type="checkbox" name="check_f2[]" id="check_f23" value="3" onclick="checkrules(3,'check_f2');"></p>
                                    </td>
                                    <td style="background-color: #91cc84;">
                                        <p>Βασικό στοιχείο της ψηφιακής στρατηγικής του οργανισμού είναι η αντικατάσταση και προμήθεια συσκευών χαμηλής ενεργειακής κατανάλωσης και η συνεχής ανακύκλωση παλαιού τεχνολογικού εξοπλισμού</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background-color: #cbe7c5;text-align: center;">
                                        <p><input type="checkbox" name="check_f3[]" id="check_f31" value="1" onclick="checkrules(1,'check_f3');"></p>
                                    </td>
                                    <td style="background-color: #cbe7c5;">
                                        <p>Υιοθέτηση ηλεκτρονικών συστημάτων αρχειοθέτησης και ψηφιακής υπογραφής για τη μείωση της χρήσης χαρτιού</p>
                                    </td>
                                    <td></td>
                                    <td style="background-color: #cbe7c5;text-align: center;">
                                        <p><input type="checkbox" name="check_f3[]" id="check_f32" value="2" onclick="checkrules(2,'check_f3');"></p>
                                    </td>
                                    <td style="background-color: #cbe7c5;">
                                        <p>Εφαρμογή ψηφιακών πλατφορμών συνεργασίας για τη διαμοιρασμό και την επεξεργασία εγγράφων online, με χρήση cloud τεχνολογιών</p>
                                    </td>
                                    <td></td>
                                    <td style="background-color: #cbe7c5;text-align: center;">
                                        <p><input type="checkbox" name="check_f3[]" id="check_f33" value="3" onclick="checkrules(3,'check_f3');"></p>
                                    </td>
                                    <td style="background-color: #cbe7c5;">
                                        <p>Αποκλειστική χρήση ψηφιακών εγγράφων και εφαρμογή blockchain/cloud τεχνολογίας για την ασφαλή και αδιάλειπτη ψηφιακή αρχειοθέτηση</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background-color: #91cc84;text-align: center;">
                                        <p><input type="checkbox" name="check_f4[]" id="check_f41" value="1" onclick="checkrules(1,'check_f4');"></p>
                                    </td>
                                    <td style="background-color: #91cc84;">
                                        <p>Δεν υπάρχει ενημέρωση του προσωπικού σχετικά με τη πράσινη μετάβαση και την αξιοποίηση των ψηφιακών μέσων προς αυτή την κατεύθυνση</p>
                                    </td>
                                    <td></td>
                                    <td style="background-color: #91cc84;text-align: center;">
                                        <p><input type="checkbox" name="check_f4[]" id="check_f42" value="2" onclick="checkrules(2,'check_f4');"></p>
                                    </td>
                                    <td style="background-color: #91cc84;">
                                        <p>Εκπαίδευση με χρήση online πλατφορμών για την αναγνώριση της σημασίας της πράσινης ευαισθητοποίησης</p>
                                    </td>
                                    <td></td>
                                    <td style="background-color: #91cc84;text-align: center;">
                                        <p><input type="checkbox" name="check_f4[]" id="check_f43" value="3" onclick="checkrules(3,'check_f4');"></p>
                                    </td>
                                    <td style="background-color: #91cc84;">
                                        <p>Δημιουργία εξειδικευμένων εκπαιδευτικών προγραμμάτων με προσομοίωση πράσινων σεναρίων εργασίας και επιπτώσεων</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background-color: #cbe7c5;text-align: center;">
                                        <p><input type="checkbox" name="check_f5[]" id="check_f51" value="1" onclick="checkrules(1,'check_f5');"></p>
                                    </td>
                                    <td style="background-color: #cbe7c5;">
                                        <p>Δεν προβλέπεται η ενημέρωση και επικοινωνία πολιτών σε περιβαλλοντικά θέματα</p>
                                    </td>
                                    <td></td>
                                    <td style="background-color: #cbe7c5;text-align: center;">
                                        <p><input type="checkbox" name="check_f5[]" id="check_f52" value="2" onclick="checkrules(2,'check_f5');"></p>
                                    </td>
                                    <td style="background-color: #cbe7c5;">
                                        <p>Δημιουργία ηλεκτρονικών πλατφορμών ενημέρωσης πολιτών για τα πράσινα έργα και πρωτοβουλίες</p>
                                    </td>
                                    <td></td>
                                    <td style="background-color: #cbe7c5;text-align: center;">
                                        <p><input type="checkbox" name="check_f5[]" id="check_f53" value="3" onclick="checkrules(3,'check_f5');"></p>
                                    </td>
                                    <td style="background-color: #cbe7c5;">
                                        <p>Ψηφιακές εφαρμογές για την ενθάρρυνση της υπεύθυνης συμπεριφοράς των πολιτών με έμφαση σε θέματα περιβαλλοντικής σημασίας</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
            </div>
            <div class="buttons">
                <a href="#" class="btn alt" data-set-step="5">Προηγούμενο</a>
                <a href="#" class="btn" data-set-step="7">Επόμενο</a>
            </div>
        </div> 

        <!-- Step 7 - G. Κοινωνικές Επιπτώσεις -->
        <div class="step-content" data-step="7">
        <div class="fields">
                <h2>Κοινωνικές Επιπτώσεις<h2>
                        <p>
                            <b>Ψηφιακές πρωτοβουλίες που στοχεύουν στη βελτίωση της ποιότητας ζωής των πολιτών.</b>
                            <br /><br />
                            <small>Διαβάστε τα χαρακτηριστικά των 3 επιπέδων ψηφιακής ωριμότητας («1 - Πρώιμο» έως το «3 - Προηγμένο») και για κάθε κριτήριο (δηλαδή για κάθε γραμμή) σημειώστε το χαρακτηριστικό του επιπέδου που θεωρείτε ότι ισχύει για τον οργανισμό σας. Όταν ολοκληρώσετε τις επιλογές σας, πατήστε <b>«Επόμενο»</b>.</small>
                        </p>
                        <table width="100%">
                            <tbody>
                                <tr>
                                    <th width="5%"></th>
                                    <th colspan="2" style="background-color: #59aa47;text-align: center;" width="31%">
                                        <p><strong>Επίπεδο 1<br />Πρώιμο</strong></p>
                                    </th>
                                    <th width="1%"></th>
                                    <th colspan="2" style="background-color: #59aa47;text-align: center;" width="31%">
                                        <p><strong>Επίπεδο 2<br />Μεταβατικό</strong></p>
                                    </th>
                                    <th width="1%"></th>
                                    <th colspan="2" style="background-color: #59aa47;text-align: center;" width="31%">
                                        <p><strong>Επίπεδο 3<br />Προηγμένο</strong></p>
                                    </th>
                                </tr>
                                <tr>
                                    <td width="5%"></td>
                                    <td width="4%"></td>
                                    <td width="27%"></td>
                                    <td width="1%"></td>
                                    <td width="4%"></td>
                                    <td width="27%"></td>
                                    <td width="1%"></td>
                                    <td width="4%"></td>
                                    <td width="27%"></td>
                                </tr>
                                <tr>
                                    <th rowspan="5" width="5%" style="background-color: #59aa47;">
                                        <div id="rotate7" class="rotates"><p><strong>Κοινωνικές Επιπτώσεις</strong></p></div>
                                    </th>
                                    <td style="background-color: #cbe7c5;text-align: center;">
                                        <p><input type="checkbox" name="check_g1[]" id="check_g11" value="1" onclick="checkrules(1,'check_g1');"></p>
                                    </td>
                                    <td style="background-color: #cbe7c5;">
                                        <p>Αξιολόγηση του αντίκτυπου του ψηφιακού μετασχηματισμού στην προσβασιμότητα των υπηρεσιών, με έμφαση στην διασφάλιση ισότιμης πρόσβασης για όλες τις κοινωνικές ομάδες</p>
                                    </td>
                                    <td></td>
                                    <td style="background-color: #cbe7c5;text-align: center;">
                                        <p><input type="checkbox" name="check_g1[]" id="check_g12" value="2" onclick="checkrules(2,'check_g1');"></p>
                                    </td>
                                    <td style="background-color: #cbe7c5;">
                                        <p>Εφαρμογή προγραμμάτων εκπαίδευσης και κατάρτισης για το προσωπικό, με στόχο την αντιμετώπιση των κοινωνικών προκλήσεων που ενδέχεται να προκύψουν</p>
                                    </td>
                                    <td></td>
                                    <td style="background-color: #cbe7c5;text-align: center;">
                                        <p><input type="checkbox" name="check_g1[]" id="check_g13" value="3" onclick="checkrules(3,'check_g1');"></p>
                                    </td>
                                    <td style="background-color: #cbe7c5;">
                                        <p>Ανάπτυξη εξειδικευμένων ψηφιακών υπηρεσιών που λαμβάνουν υπόψη τις ανάγκες των ευπαθών ομάδων και προωθούν την κοινωνική συνοχή</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background-color: #91cc84;text-align: center;">
                                        <p><input type="checkbox" name="check_g2[]" id="check_g21" value="1" onclick="checkrules(1,'check_g2');"></p>
                                    </td>
                                    <td style="background-color: #91cc84;">
                                        <p>Ανάπτυξη ψηφιακών πλατφορμών για εύκολη πρόσβαση των πολιτών σε πληροφορίες και υπηρεσίες του οργανισμού</p>
                                    </td>
                                    <td></td>
                                    <td style="background-color: #91cc84;text-align: center;">
                                        <p><input type="checkbox" name="check_g2[]" id="check_g22" value="2" onclick="checkrules(2,'check_g2');"></p>
                                    </td>
                                    <td style="background-color: #91cc84;">
                                        <p>Ενίσχυση της διαλειτουργικότητας και της αμοιβαίας επικοινωνίας μεταξύ των διαφόρων ψηφιακών πλατφορμών που χρησιμοποιούν οι πολίτες</p>
                                    </td>
                                    <td></td>
                                    <td style="background-color: #91cc84;text-align: center;">
                                        <p><input type="checkbox" name="check_g2[]" id="check_g23" value="3" onclick="checkrules(3,'check_g2');"></p>
                                    </td>
                                    <td style="background-color: #91cc84;">
                                        <p>Δημιουργία διαδραστικών εφαρμογών και εργαλείων που επιτρέπουν στους πολίτες να συμμετέχουν ενεργά στις διαδικασίες του οργανισμού και τις αποφάσεις</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background-color: #cbe7c5;text-align: center;">
                                        <p><input type="checkbox" name="check_g3[]" id="check_g31" value="1" onclick="checkrules(1,'check_g3');"></p>
                                    </td>
                                    <td style="background-color: #cbe7c5;">
                                        <p>Έλλειψη ψηφιακής ενημέρωσης και συμμετοχής μέσω ηλεκτρονικών πλατφορμών</p>
                                    </td>
                                    <td></td>
                                    <td style="background-color: #cbe7c5;text-align: center;">
                                        <p><input type="checkbox" name="check_g3[]" id="check_g32" value="2" onclick="checkrules(2,'check_g3');"></p>
                                    </td>
                                    <td style="background-color: #cbe7c5;">
                                        <p>Προώθηση της ψηφιακής ενημέρωσης για δράσεις του οργανισμού</p>
                                    </td>
                                    <td></td>
                                    <td style="background-color: #cbe7c5;text-align: center;">
                                        <p><input type="checkbox" name="check_g3[]" id="check_g33" value="3" onclick="checkrules(3,'check_g3');"></p>
                                    </td>
                                    <td style="background-color: #cbe7c5;">
                                        <p>Ανάπτυξη/Χρήση ψηφιακών πλατφορμών που παρέχουν διαφάνεια στη διαδικασία λήψης αποφάσεων</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background-color: #91cc84;text-align: center;">
                                        <p><input type="checkbox" name="check_g4[]" id="check_g41" value="1" onclick="checkrules(1,'check_g4');"></p>
                                    </td>
                                    <td style="background-color: #91cc84;">
                                        <p>Προσφορά διαδικτυακών εκπαιδευτικών υλικών στο προσωπικό για την κατανόηση των ψηφιακών διαδικασιών</p>
                                    </td>
                                    <td></td>
                                    <td style="background-color: #91cc84;text-align: center;">
                                        <p><input type="checkbox" name="check_g4[]" id="check_g42" value="2" onclick="checkrules(2,'check_g4');"></p>
                                    </td>
                                    <td style="background-color: #91cc84;">
                                        <p>Δημιουργία προγραμμάτων εκπαίδευσης προσωπικού για την αποτελεσματική χρήση των ψηφιακών εργαλείων</p>
                                    </td>
                                    <td></td>
                                    <td style="background-color: #91cc84;text-align: center;">
                                        <p><input type="checkbox" name="check_g4[]" id="check_g43" value="3" onclick="checkrules(3,'check_g4');"></p>
                                    </td>
                                    <td style="background-color: #91cc84;">
                                        <p>Ανάπτυξη διαδραστικών ψηφιακών πλατφορμών για τη συνεχή κατάρτιση και επαγγελματική ανάπτυξη του προσωπικού</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background-color: #cbe7c5;text-align: center;">
                                        <p><input type="checkbox" name="check_g5[]" id="check_g51" value="1" onclick="checkrules(1,'check_g5');"></p>
                                    </td>
                                    <td style="background-color: #cbe7c5;">
                                        <p>Εφαρμογή βασικών μέτρων ψηφιακής ασφάλειας για προστασία των προσωπικών δεδομένων</p>
                                    </td>
                                    <td></td>
                                    <td style="background-color: #cbe7c5;text-align: center;">
                                        <p><input type="checkbox" name="check_g5[]" id="check_g52" value="2" onclick="checkrules(2,'check_g5');"></p>
                                    </td>
                                    <td style="background-color: #cbe7c5;">
                                        <p>Ανάπτυξη προγραμμάτων ευαισθητοποίησης για τους ψηφιακούς κινδύνους και τις προληπτικές μεθόδους</p>
                                    </td>
                                    <td></td>
                                    <td style="background-color: #cbe7c5;text-align: center;">
                                        <p><input type="checkbox" name="check_g5[]" id="check_g53" value="3" onclick="checkrules(3,'check_g5');"></p>
                                    </td>
                                    <td style="background-color: #cbe7c5;">
                                        <p>Ενίσχυση της ψηφιακής ασφάλειας μέσω σύγχρονων τεχνολογικών λύσεων και εκπαίδευσης</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
            </div>
            <div class="buttons">
                <a href="#" class="btn alt" data-set-step="6">Προηγούμενο</a>
                <a href="#" class="btn" data-set-step="8">Επόμενο</a>
            </div>
        </div> 

        <!-- Step 8 - H. Γαλάζια Οικονομία -->
        <div class="step-content" data-step="8">
        <div class="fields">
                <h2>Γαλάζια Οικονομία<h2>
                        <p>
                            <b>Ψηφιακές λύσεις που στηρίζουν την βιώσιμη χρήση των θαλάσσιων πόρων, την προστασία του περιβάλλοντος και τη διατήρηση των ωκεανών.</b>
                            <br /><br />
                            <small>Διαβάστε τα χαρακτηριστικά των 3 επιπέδων ψηφιακής ωριμότητας («1 - Πρώιμο» έως το «3 - Προηγμένο») και για κάθε κριτήριο (δηλαδή για κάθε γραμμή) σημειώστε το χαρακτηριστικό του επιπέδου που θεωρείτε ότι ισχύει για τον οργανισμό σας. Όταν ολοκληρώσετε τις επιλογές σας, πατήστε <b>«Επόμενο»</b>.</small>
                        </p>
                        <table width="100%">
                            <tbody>
                                <tr>
                                    <th width="5%"></th>
                                    <th colspan="2" style="background-color: #59aa47;text-align: center;" width="31%">
                                        <p><strong>Επίπεδο 1<br />Πρώιμο</strong></p>
                                    </th>
                                    <th width="1%"></th>
                                    <th colspan="2" style="background-color: #59aa47;text-align: center;" width="31%">
                                        <p><strong>Επίπεδο 2<br />Μεταβατικό</strong></p>
                                    </th>
                                    <th width="1%"></th>
                                    <th colspan="2" style="background-color: #59aa47;text-align: center;" width="31%">
                                        <p><strong>Επίπεδο 3<br />Προηγμένο</strong></p>
                                    </th>
                                </tr>
                                <tr>
                                    <td width="5%"></td>
                                    <td width="4%"></td>
                                    <td width="27%"></td>
                                    <td width="1%"></td>
                                    <td width="4%"></td>
                                    <td width="27%"></td>
                                    <td width="1%"></td>
                                    <td width="4%"></td>
                                    <td width="27%"></td>
                                </tr>
                                <tr>
                                    <th rowspan="5" width="5%" style="background-color: #59aa47;">
                                        <div id="rotate8" class="rotates"><p><strong>Γαλάζια Οικονομία</strong></p></div>
                                    </th>
                                    <td style="background-color: #cbe7c5;text-align: center;">
                                        <p><input type="checkbox" name="check_h1[]" id="check_h11" value="1" onclick="checkrules(1,'check_h1');"></p>
                                    </td>
                                    <td style="background-color: #cbe7c5;">
                                        <p>Δεν υπάρχει σχέδιο δράσης για τη μετάβαση προς τη γαλάζια οικονομία</p>
                                    </td>
                                    <td></td>
                                    <td style="background-color: #cbe7c5;text-align: center;">
                                        <p><input type="checkbox" name="check_h1[]" id="check_h12" value="2" onclick="checkrules(2,'check_h1');"></p>
                                    </td>
                                    <td style="background-color: #cbe7c5;">
                                        <p>Κατάρτιση ενός στρατηγικού σχεδίου με την ενσωμάτωση βασικών ψηφιακών τεχνολογιών και δεδομένων για τη βελτιστοποίηση της γαλάζιας οικονομίας</p>
                                    </td>
                                    <td></td>
                                    <td style="background-color: #cbe7c5;text-align: center;">
                                        <p><input type="checkbox" name="check_h1[]" id="check_h13" value="3" onclick="checkrules(3,'check_h1');"></p>
                                    </td>
                                    <td style="background-color: #cbe7c5;">
                                        <p>Δημιουργία μιας συνολικής στρατηγικής με τη χρήση προηγμένων ψηφιακών τεχνολογιών για τη γαλάζια οικονομία, συμπεριλαμβανομένων στόχων, δράσεων και προγραμμάτων που υποστηρίζουν τη βιώσιμη χρήση και διαχείριση των θαλάσσιων πόρων</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background-color: #91cc84;text-align: center;">
                                        <p><input type="checkbox" name="check_h2[]" id="check_h21" value="1" onclick="checkrules(1,'check_h2');"></p>
                                    </td>
                                    <td style="background-color: #91cc84;">
                                        <p>Δεν υπάρχει ενημέρωση ή εκπαίδευση του προσωπικού για θέματα γαλάζια οικονομίας</p>
                                    </td>
                                    <td></td>
                                    <td style="background-color: #91cc84;text-align: center;">
                                        <p><input type="checkbox" name="check_h2[]" id="check_h22" value="2" onclick="checkrules(2,'check_h2');"></p>
                                    </td>
                                    <td style="background-color: #91cc84;">
                                        <p>Παροχή διαδικτυακών μαθημάτων και εκπαιδευτικών πόρων με εξειδίκευση σε θέματα βιώσιμης ανάπτυξης και γαλάζιας οικονομίας</p>
                                    </td>
                                    <td></td>
                                    <td style="background-color: #91cc84;text-align: center;">
                                        <p><input type="checkbox" name="check_h2[]" id="check_h23" value="3" onclick="checkrules(3,'check_h2');"></p>
                                    </td>
                                    <td style="background-color: #91cc84;">
                                        <p>Συνεχής εκπαίδευση και κατάρτιση του προσωπικού σε θέματα βιώσιμης ανάπτυξης και γαλάζιας οικονομίας μέσω σύγχρονων ψηφιακών μέσων</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background-color: #cbe7c5;text-align: center;">
                                        <p><input type="checkbox" name="check_h3[]" id="check_h31" value="1" onclick="checkrules(1,'check_h3');"></p>
                                    </td>
                                    <td style="background-color: #cbe7c5;">
                                        <p>Δημιουργία ψηφιακών πλατφορμών για την ενημέρωση των πολιτών σχετικά με τη γαλάζια οικονομία, προσφέροντας πληροφορίες σχετικά με τη θαλάσσια ζωή και τις δραστηριότητες</p>
                                    </td>
                                    <td></td>
                                    <td style="background-color: #cbe7c5;text-align: center;">
                                        <p><input type="checkbox" name="check_h3[]" id="check_h32" value="2" onclick="checkrules(2,'check_h3');"></p>
                                    </td>
                                    <td style="background-color: #cbe7c5;">
                                        <p>Ενθάρρυνση της συμμετοχής των πολιτών σε πρωτοβουλίες γαλάζιας οικονομίας μέσω ψηφιακών πλατφορμών συλλογής ιδεών και προτάσεων</p>
                                    </td>
                                    <td></td>
                                    <td style="background-color: #cbe7c5;text-align: center;">
                                        <p><input type="checkbox" name="check_h3[]" id="check_h33" value="3" onclick="checkrules(3,'check_h3');"></p>
                                    </td>
                                    <td style="background-color: #cbe7c5;">
                                        <p>Δημιουργία εκπαιδευτικών προγραμμάτων για τους πολίτες, χρησιμοποιώντας εξελιγμένες τεχνολογίες όπως εικονική πραγματικότητα και προσομοίωση, προκειμένου να κατανοήσουν τη σημασία της γαλάζιας οικονομίας</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background-color: #91cc84;text-align: center;">
                                        <p><input type="checkbox" name="check_h4[]" id="check_h41" value="1" onclick="checkrules(1,'check_h4');"></p>
                                    </td>
                                    <td style="background-color: #91cc84;">
                                        <p>Ανάπτυξη διαδικτυακών πλατφορμών για τη συζήτηση και τη λήψη ανατροφοδότησης από τους πολίτες για τον σχεδιασμό γαλάζιων οικονομικών πολιτικών</p>
                                    </td>
                                    <td></td>
                                    <td style="background-color: #91cc84;text-align: center;">
                                        <p><input type="checkbox" name="check_h4[]" id="check_h42" value="2" onclick="checkrules(2,'check_h4');"></p>
                                    </td>
                                    <td style="background-color: #91cc84;">
                                        <p>Ενθάρρυνση της συμμετοχής των πολιτών σε συνεδριάσεις και διαβουλεύσεις μέσω ψηφιακών εφαρμογών, προκειμένου να εκφράσουν τις απόψεις τους</p>
                                    </td>
                                    <td></td>
                                    <td style="background-color: #91cc84;text-align: center;">
                                        <p><input type="checkbox" name="check_h4[]" id="check_h43" value="3" onclick="checkrules(3,'check_h4');"></p>
                                    </td>
                                    <td style="background-color: #91cc84;">
                                        <p>Ανάπτυξη διαδραστικών πλατφορμών συνεργασίας μεταξύ πολιτών και αρχών για τον κοινό σχεδιασμό πολιτικών για τη γαλάζια οικονομία</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background-color: #cbe7c5;text-align: center;">
                                        <p><input type="checkbox" name="check_h5[]" id="check_h51" value="1" onclick="checkrules(1,'check_h5');"></p>
                                    </td>
                                    <td style="background-color: #cbe7c5;">
                                        <p>Δεν προβλέπεται η επένδυση για την ενίσχυση της γαλάζιας οικονομίας με βάση ψηφιακά εργαλεία</p>
                                    </td>
                                    <td></td>
                                    <td style="background-color: #cbe7c5;text-align: center;">
                                        <p><input type="checkbox" name="check_h5[]" id="check_h52" value="2" onclick="checkrules(2,'check_h5');"></p>
                                    </td>
                                    <td style="background-color: #cbe7c5;">
                                        <p>Είναι στα άμεσα σχέδια του οργανισμού μια επένδυση για την προώθηση της γαλάζια οικονομίας</p>
                                    </td>
                                    <td></td>
                                    <td style="background-color: #cbe7c5;text-align: center;">
                                        <p><input type="checkbox" name="check_h5[]" id="check_h53" value="3" onclick="checkrules(3,'check_h5');"></p>
                                    </td>
                                    <td style="background-color: #cbe7c5;">
                                        <p>Επένδυση σε προγράμματα έρευνας και ανάπτυξης νέων τεχνολογιών και μεθόδων που προωθούν τη γαλάζια οικονομία</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
            </div>
            <div class="buttons">
                <a href="#" class="btn alt" data-set-step="7">Προηγούμενο</a>
                <a href="#" class="btn" data-set-step="9">Επόμενο</a>
            </div>
        </div> 

        <!-- Step 9 - I. Δίκαιη Μετάβαση -->
        <div class="step-content" data-step="9">
        <div class="fields">
                <h2>Δίκαιη Μετάβαση<h2>
                        <p>
                            <b>Ισότιμη πρόσβαση σε ψηφιακές ευκαιρίες, η συμμετοχή σε εκπαιδευτικά προγράμματα και επανακατάρτιση, ενίσχυση της συμμετοχής της κοινότητας στη διαδικασία λήψης αποφάσεων.</b>
                            <br /><br />
                            <small>Διαβάστε τα χαρακτηριστικά των 3 επιπέδων ψηφιακής ωριμότητας («1 - Πρώιμο» έως το «3 - Προηγμένο») και για κάθε κριτήριο (δηλαδή για κάθε γραμμή) σημειώστε το χαρακτηριστικό του επιπέδου που θεωρείτε ότι ισχύει για τον οργανισμό σας. Όταν ολοκληρώσετε τις επιλογές σας, πατήστε <b>«Επόμενο»</b>.</small>
                        </p>
                        <table width="100%">
                            <tbody>
                                <tr>
                                    <th width="5%"></th>
                                    <th colspan="2" style="background-color: #59aa47;text-align: center;" width="31%">
                                        <p><strong>Επίπεδο 1<br />Πρώιμο</strong></p>
                                    </th>
                                    <th width="1%"></th>
                                    <th colspan="2" style="background-color: #59aa47;text-align: center;" width="31%">
                                        <p><strong>Επίπεδο 2<br />Μεταβατικό</strong></p>
                                    </th>
                                    <th width="1%"></th>
                                    <th colspan="2" style="background-color: #59aa47;text-align: center;" width="31%">
                                        <p><strong>Επίπεδο 3<br />Προηγμένο</strong></p>
                                    </th>
                                </tr>
                                <tr>
                                    <td width="5%"></td>
                                    <td width="4%"></td>
                                    <td width="27%"></td>
                                    <td width="1%"></td>
                                    <td width="4%"></td>
                                    <td width="27%"></td>
                                    <td width="1%"></td>
                                    <td width="4%"></td>
                                    <td width="27%"></td>
                                </tr>
                                <tr>
                                    <th rowspan="5" width="5%" style="background-color: #59aa47;">
                                        <div id="rotate9" class="rotates"><p><strong>Δίκαιη Μετάβαση</strong></p></div>
                                    </th>
                                    <td style="background-color: #cbe7c5;text-align: center;">
                                        <p><input type="checkbox" name="check_i1[]" id="check_i11" value="1" onclick="checkrules(1,'check_i1');"></p>
                                    </td>
                                    <td style="background-color: #cbe7c5;">
                                        <p>Αξιολόγηση της διαθεσιμότητας των ψηφιακών υπηρεσιών σε όλες τις κοινωνικές ομάδες, με εστίαση στην διασφάλιση ίσων ευκαιριών πρόσβασης</p>
                                    </td>
                                    <td></td>
                                    <td style="background-color: #cbe7c5;text-align: center;">
                                        <p><input type="checkbox" name="check_i1[]" id="check_i12" value="2" onclick="checkrules(2,'check_i1');"></p>
                                    </td>
                                    <td style="background-color: #cbe7c5;">
                                        <p>Δημιουργία εκπαιδευτικών προγραμμάτων για την κατανόηση των ψηφιακών εργαλείων και την αντιμετώπιση των προκλήσεων που μπορεί να προκύψουν κατά τη μετάβαση</p>
                                    </td>
                                    <td></td>
                                    <td style="background-color: #cbe7c5;text-align: center;">
                                        <p><input type="checkbox" name="check_i1[]" id="check_i13" value="3" onclick="checkrules(3,'check_i1');"></p>
                                    </td>
                                    <td style="background-color: #cbe7c5;">
                                        <p>Ανάπτυξη εξειδικευμένων προγραμμάτων ενίσχυσης της ψηφιακής ευφυΐας για τις κοινωνικές ομάδες που αντιμετωπίζουν δυσκολίες</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background-color: #91cc84;text-align: center;">
                                        <p><input type="checkbox" name="check_i2[]" id="check_i21" value="1" onclick="checkrules(1,'check_i2');"></p>
                                    </td>
                                    <td style="background-color: #91cc84;">
                                        <p>Ανάπτυξη προγραμμάτων που προάγουν τη συμμετοχή των πολιτών στις διαδικασίες λήψης αποφάσεων μέσω των ψηφιακών πλατφορμών</p>
                                    </td>
                                    <td></td>
                                    <td style="background-color: #91cc84;text-align: center;">
                                        <p><input type="checkbox" name="check_i2[]" id="check_i22" value="2" onclick="checkrules(2,'check_i2');"></p>
                                    </td>
                                    <td style="background-color: #91cc84;">
                                        <p>Καθιέρωση ψηφιακών εργαλείων που δίνουν φωνή στις ευαίσθητες κοινωνικές ομάδες και αντανακλούν τις ανάγκες τους</p>
                                    </td>
                                    <td></td>
                                    <td style="background-color: #91cc84;text-align: center;">
                                        <p><input type="checkbox" name="check_i2[]" id="check_i23" value="3" onclick="checkrules(3,'check_i2');"></p>
                                    </td>
                                    <td style="background-color: #91cc84;">
                                        <p>Προώθηση ψηφιακών πλατφορμών που ενισχύουν τη διαλειτουργικότητα και την συνεργασία μεταξύ των πολιτών</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background-color: #cbe7c5;text-align: center;">
                                        <p><input type="checkbox" name="check_i3[]" id="check_i31" value="1" onclick="checkrules(1,'check_i3');"></p>
                                    </td>
                                    <td style="background-color: #cbe7c5;">
                                        <p>Αξιολόγηση των ψηφιακών πρωτοβουλιών ως προς την προαγωγή της κοινωνικής δικαιοσύνης</p>
                                    </td>
                                    <td></td>
                                    <td style="background-color: #cbe7c5;text-align: center;">
                                        <p><input type="checkbox" name="check_i3[]" id="check_i32" value="2" onclick="checkrules(2,'check_i3');"></p>
                                    </td>
                                    <td style="background-color: #cbe7c5;">
                                        <p>Εφαρμογή πολιτικών που εξισορροπούν τις ψηφιακές ευκαιρίες μεταξύ διαφορετικών ομάδων</p>
                                    </td>
                                    <td></td>
                                    <td style="background-color: #cbe7c5;text-align: center;">
                                        <p><input type="checkbox" name="check_i3[]" id="check_i33" value="3" onclick="checkrules(3,'check_i3');"></p>
                                    </td>
                                    <td style="background-color: #cbe7c5;">
                                        <p>Ανάπτυξη εξειδικευμένων προγραμμάτων που αντιμετωπίζουν ψηφιακές ανισότητες και προωθούν τη δικαιότερη χρήση τεχνολογίας</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background-color: #91cc84;text-align: center;">
                                        <p><input type="checkbox" name="check_i4[]" id="check_i41" value="1" onclick="checkrules(1,'check_i4');"></p>
                                    </td>
                                    <td style="background-color: #91cc84;">
                                        <p>Προσφορά ψηφιακών εκπαιδευτικών πόρων για την κατανόηση του ψηφιακού μετασχηματισμού</p>
                                    </td>
                                    <td></td>
                                    <td style="background-color: #91cc84;text-align: center;">
                                        <p><input type="checkbox" name="check_i4[]" id="check_i42" value="2" onclick="checkrules(2,'check_i4');"></p>
                                    </td>
                                    <td style="background-color: #91cc84;">
                                        <p>Καθιέρωση εκπαιδευτικών προγραμμάτων που ενισχύουν τις δεξιότητες αντιμετώπισης των ψηφιακών προκλήσεων</p>
                                    </td>
                                    <td></td>
                                    <td style="background-color: #91cc84;text-align: center;">
                                        <p><input type="checkbox" name="check_i4[]" id="check_i43" value="3" onclick="checkrules(3,'check_i4');"></p>
                                    </td>
                                    <td style="background-color: #91cc84;">
                                        <p>Δημιουργία διαρθρωμένων προγραμμάτων κατάρτισης για εξειδικευμένες ψηφιακές θεματικές</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background-color: #cbe7c5;text-align: center;">
                                        <p><input type="checkbox" name="check_i5[]" id="check_i51" value="1" onclick="checkrules(1,'check_i5');"></p>
                                    </td>
                                    <td style="background-color: #cbe7c5;">
                                        <p>Ανάλυση του πώς ο ψηφιακός μετασχηματισμός επηρεάζει τις εργασιακές συνθήκες και την κοινωνική προστασία</p>
                                    </td>
                                    <td></td>
                                    <td style="background-color: #cbe7c5;text-align: center;">
                                        <p><input type="checkbox" name="check_i5[]" id="check_i52" value="2" onclick="checkrules(2,'check_i5');"></p>
                                    </td>
                                    <td style="background-color: #cbe7c5;">
                                        <p>Εφαρμογή πολιτικών που διασφαλίζουν την δίκαιη μετάβαση των εργαζομένων σε έναν ψηφιακό κόσμο</p>
                                    </td>
                                    <td></td>
                                    <td style="background-color: #cbe7c5;text-align: center;">
                                        <p><input type="checkbox" name="check_i5[]" id="check_i53" value="3" onclick="checkrules(3,'check_i5');"></p>
                                    </td>
                                    <td style="background-color: #cbe7c5;">
                                        <p>Ανάπτυξη προγραμμάτων κοινωνικής προστασίας που λαμβάνουν υπόψη τις εργασιακές αλλαγές λόγω του ψηφιακού μετασχηματισμού</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
            </div>
            <div class="buttons">
                <a href="#" class="btn alt" data-set-step="8">Προηγούμενο</a>
                <a href="#" class="btn" data-set-step="10">Επόμενο</a>
            </div>
        </div>         

        <!-- Step 10 - Στοιχεία Φορέα/Επιχείρησης-->
        <div class="step-content" data-step="10">
            <div class="fields">
                <h2>Στοιχεία Φορέα/Επιχείρησης<h2><br/>
                <label for="company">Επωνυμία Φορέα/Επιχείρησης:</label>
                <div class="field">
                    <i class="fas fa-building"></i>
                    <input id="company" type="text" name="company" required>
                </div>  
                <label for="afm">Αριθμός Φορολογικού Μητρώου (ΑΦΜ):</label>
                <div class="field">
                    <i class="fas fa-percent"></i>
                    <input id="afm" type="text" inputmode="numeric" pattern="\d*" name="afm" required>
                </div>
                <label for="sector">Κύριος Τομέας Οικονομικής Δραστηριότητας:</label>
                <div class="field">
                    <select id="sector" name="sector" onchange="update_sector_levels();" required>
                        <option value="">Επιλέξτε ...</option>
						<option value="Τομέας Α - Γεωργία, Δασοκομία και Αλιεία">Γεωργία, Δασοκομία και Αλιεία</option>
						<option value="Τομέας Β - Ορυχεία και Λατομεία">Ορυχεία και Λατομεία</option>
						<option value="Τομέας Γ - Μεταποίηση">Μεταποίηση</option>
						<option value="Τομέας Δ - Παροχή Ηλεκτρικού Ρεύματος, Φυσικού Αεριού, Ατμού και Κλιματισμού">Παροχή Ηλεκτρικού Ρεύματος, Φυσικού Αεριού, Ατμού και Κλιματισμού</option>
						<option value="Τομέας Ε - Παροχή Νερού, Επεξεργασία Λυμάτων, Διαχείριση Αποβλήτων και Δραστηριότητες Εξυγίανσης">Παροχή Νερού, Επεξεργασία Λυμάτων, Διαχείριση Αποβλήτων και Δραστηριότητες Εξυγίανσης</option>
						<option value="Τομέας ΣΤ - Κατασκευές">Κατασκευές</option>
						<option value="Τομέας Ζ - Χονδρικό και Λιανικό Εμπόριο">Χονδρικό και Λιανικό Εμπόριο</option>
						<option value="Τομέας Η - Μεταφορές και Αποθήκευση">Μεταφορές και Αποθήκευση</option>
						<option value="Τομέας Θ - Δραστηριότητες Υπηρεσιών Παροχής Καταλύματος και Υπηρεσιών Εστίασης">Δραστηριότητες Υπηρεσιών Παροχής Καταλύματος και Υπηρεσιών Εστίασης</option>
						<option value="Τομέας Ι - Δραστηριότητες Έκδοσης, Ραδιοτηλεοπτικών Μεταδόσεων και Παραγωγής και Διανομής Περιεχομένου">Δραστηριότητες Έκδοσης, Ραδιοτηλεοπτικών Μεταδόσεων και Παραγωγής και Διανομής Περιεχομένου</option>
						<option value="Τομέας Κ - Τηλεπικοινωνίες, Προγραμματισμός Ηλεκτρονικών Υπολογιστών, Παροχή Συμβουλών, Υπολογιστική Υποδομή και Άλλες Δραστηριότητες Υπηρεσιών Πληροφορίας">Τηλεπικοινωνίες, Προγραμματισμός Ηλεκτρονικών Υπολογιστών, Παροχή Συμβουλών, Υπολογιστική Υποδομή και Άλλες Δραστηριότητες Υπηρεσιών Πληροφορίας</option>
						<option value="Τομέας Λ - Χρηματοπιστωτικές και Ασφαλιστικές Δραστηριότητες">Χρηματοπιστωτικές και Ασφαλιστικές Δραστηριότητες</option>
						<option value="Τομέας Μ - Διαχείριση Ακίνητης Περιουσίας">Διαχείριση Ακίνητης Περιουσίας</option>
						<option value="Τομέας Ν - Επαγγελματικές, Επιστημονικές και Τεχνικές Δραστηριότητες">Επαγγελματικές, Επιστημονικές και Τεχνικές Δραστηριότητες</option>
						<option value="Τομέας Ξ - Διοικητικές και Υποστηρικτικές Δραστηριότητες">Διοικητικές και Υποστηρικτικές Δραστηριότητες</option>
						<option value="Τομέας Ο - Δημόσια Διοίκηση και Άμυνα - Υποχρεωτική Κοινωνική Ασφάλιση">Δημόσια Διοίκηση και Άμυνα - Υποχρεωτική Κοινωνική Ασφάλιση</option>
						<option value="Τομέας Π - Εκπαίδευση">Εκπαίδευση</option>
						<option value="Τομέας Ρ - Δραστηριότητες Σχετικές με την Ανθρώπινη Υγεία και την Κοινωνική Μέριμνα">Δραστηριότητες Σχετικές με την Ανθρώπινη Υγεία και την Κοινωνική Μέριμνα</option>
						<option value="Τομέας Σ - Τέχνες, Διασκέδαση και Ψυχαγωγία">Τέχνες, Διασκέδαση και Ψυχαγωγία</option>
						<option value="Τομέας Τ - Άλλες Δραστηριότητες Παροχής Υπηρεσιών">Άλλες Δραστηριότητες Παροχής Υπηρεσιών</option>
						<option value="Τομέας Υ - Δραστηριότητες Νοικοκυριών ως Εργοδοτών και μη Διαφοροποιημένες Δραστηριότητες Νοικοκυριών, που Αφορούν την Παραγωγή Αγαθών -και Υπηρεσιών- για Ιδία Χρήση">Δραστηριότητες Νοικοκυριών ως Εργοδοτών και μη Διαφοροποιημένες Δραστηριότητες Νοικοκυριών, που Αφορούν την Παραγωγή Αγαθών -και Υπηρεσιών- για Ιδία Χρήση</option>
						<option value="Τομέας Φ - Δραστηριότητες Ετερόδικων Οργανισμών και Φορέων">Δραστηριότητες Ετερόδικων Οργανισμών και Φορέων</option>
                    </select> 
                </div>
                <label for="sector_level1">Επιμέρους Κατηγορία Κύριας Οικονομικής Δραστηριότητας:</label>
                <div class="field">
                    <select id="sector_level1" name="sector_level1" required>
                        <option value="">Επιλέξτε ...</option>
                    </select> 
                </div>  				
                <label for="region">Περιφέρεια:</label>
                <div class="field">
                    <select id="region" name="region" onchange="update_regional_units();" required>
                        <option value="">Επιλέξτε ...</option>
                        <option value="Ανατολικής Μακεδονίας και Θράκης">Ανατολικής Μακεδονίας και Θράκης</option>
                        <option value="Αττικής">Αττικής</option>
                        <option value="Βορείου Αιγαίου">Βορείου Αιγαίου</option>
                        <option value="Δυτικής Ελλάδας">Δυτικής Ελλάδας</option>
                        <option value="Δυτικής Μακεδονίας">Δυτικής Μακεδονίας</option>
                        <option value="Ηπείρου">Ηπείρου</option>
                        <option value="Θεσσαλίας">Θεσσαλίας</option>
                        <option value="Ιονίων Νήσων">Ιονίων Νήσων</option>
                        <option value="Κεντρικής Μακεδονίας">Κεντρικής Μακεδονίας</option>
                        <option value="Κρήτης">Κρήτης</option>
                        <option value="Νοτίου Αιγαίου">Νοτίου Αιγαίου</option>
                        <option value="Πελοποννήσου">Πελοποννήσου</option>
                        <option value="Στερεάς Ελλάδας">Στερεάς Ελλάδας</option>
                    </select> 
                </div>
                <label for="regional_unit">Περιφερειακή Eνότητα:</label>
                <div class="field">
                    <select id="regional_unit" name="regional_unit" required>
                        <option value="">Επιλέξτε ...</option>
                    </select> 
                </div>  
                <label for="email">Διεύθυνση Email:</label>
                <div class="field">
                    <i class="fas fa-envelope"></i>
                    <input id="email" type="email" name="email" required>
                </div>				
            </div>
            <div class="buttons">
                <a href="#" class="btn alt" data-set-step="9">Προηγούμενο</a>
                <input id="submitbtn" type="submit" class="btn" name="submit" value="Υποβολή">
            </div>
        </div>

        <!-- Step 11 - DMA Rating -->
        <div class="step-content" data-step="11">
            <div class="result"><?= $response ?></div>
        </div>
		
		<div>
		    <p style="font-size:11px; text-align: center;">Δράση ενίσχυσης επενδύσεων «Εμβληματικές δράσεις σε διαθεματικές επιστημονικές περιοχές με ειδικό ενδιαφέρον για την σύνδεση με τον παραγωγικό ιστό» / Ανθεκτικότητα, Συμπερίληψη και Ανάπτυξη: Προς μια Δίκαιη Πράσινη και Ψηφιακή Μετάβαση των Ελληνικών Περιφερειών – TAEDR-0537352.<br/>Η δράση υλοποιείται στο πλαίσιο του Εθνικού Σχεδίου Ανάκαμψης και Ανθεκτικότητας Ελλάδα 2.0 με τη χρηματοδότηση της Ευρωπαϊκής Ένωσης – NextGenerationEU.<br/><br/></p>
		</div>

    </form>

    <!-- JS code -->
    <script>
        const setStep = step => {
            document.querySelectorAll(".step-content").forEach(element => element.style.display = "none");
            document.querySelector("[data-step='" + step + "']").style.display = "block";
            document.querySelectorAll(".steps .step").forEach((element, index) => {
                index < step - 1 ? element.classList.add("complete") : element.classList.remove("complete");
                index == step - 1 ? element.classList.add("current") : element.classList.remove("current");
            });
        };
        document.querySelectorAll("[data-set-step]").forEach(element => {
            element.onclick = event => {
                event.preventDefault();
                setStep(parseInt(element.dataset.setStep));
            };
        });
		
		function validateAFM(afm) {
			if (!afm.match(/^\d{9}$/) || afm == '000000000')
				return false;

			var m = 1, sum = 0;
			for (var i = 7; i >= 0; i--) {
				m *= 2;
				sum += afm.charAt(i) * m;
			}

			return sum % 11 % 10 == afm.charAt(8);
		}
		
		const aafm = document.getElementById('afm');
		
		const inputHandler = function(e) {
			if(!validateAFM(e.target.value)){
				aafm.style.color = "#ff0000";
				document.getElementById("submitbtn").disabled = true;
			}else{
				aafm.style.color = "#3cbc8d";
				document.getElementById("submitbtn").disabled = false;
			}
		}

       aafm.addEventListener('input', inputHandler);
		
		function agentHas(keyword) {
            return navigator.userAgent.toLowerCase().search(keyword.toLowerCase()) > -1;
		}

		function isSafari() {
			return (!!window.ApplePaySetupFeature || !!window.safari) && agentHas("Safari") && !agentHas("Chrome") && !agentHas("CriOS");
		}
		
		window.onload = function updateRotateForSafari(){
			if (isSafari()) {
				const rt1 = document.getElementById("rotate1");
				rt1.classList.add('rotates-safari');
				rt1.classList.remove('rotates');
				
				const rt2 = document.getElementById("rotate2");
				rt2.classList.add('rotates-safari');
				rt2.classList.remove('rotates');

				const rt3 = document.getElementById("rotate3");
				rt3.classList.add('rotates-safari');
				rt3.classList.remove('rotates');

				const rt4 = document.getElementById("rotate4");
				rt4.classList.add('rotates-safari');
				rt4.classList.remove('rotates');

				const rt5 = document.getElementById("rotate5");
				rt5.classList.add('rotates-safari');
				rt5.classList.remove('rotates');

				const rt6 = document.getElementById("rotate6");
				rt6.classList.add('rotates-safari');
				rt6.classList.remove('rotates');

				const rt7 = document.getElementById("rotate7");
				rt7.classList.add('rotates-safari');
				rt7.classList.remove('rotates');

				const rt8 = document.getElementById("rotate8");
				rt8.classList.add('rotates-safari');
				rt8.classList.remove('rotates');

				const rt9 = document.getElementById("rotate9");
				rt9.classList.add('rotates-safari');
				rt9.classList.remove('rotates');
			}
		}
        
        function checkrules(i, n) {
            if (i == 1) {
                if (document.getElementById(n+'1').checked) {
                    document.getElementById(n+'1').checked = true;
                    document.getElementById(n+'2').checked = false;
                    document.getElementById(n+'3').checked = false;
                } else {
                    document.getElementById(n+'1').checked = false;
                    document.getElementById(n+'2').checked = false;
                    document.getElementById(n+'3').checked = false;
                }
            } else if (i == 2) {
                if (document.getElementById(n+'2').checked) {
                    document.getElementById(n+'1').checked = true;
                    document.getElementById(n+'2').checked = true;
                    document.getElementById(n+'3').checked = false;
                } else {
                    document.getElementById(n+'2').checked = false;
                    document.getElementById(n+'3').checked = false;
                }
            } else if (i == 3) {
                if (document.getElementById(n+'3').checked) {
                    document.getElementById(n+'1').checked = true;
                    document.getElementById(n+'2').checked = true;
                    document.getElementById(n+'3').checked = true;
                } else {
                    document.getElementById(n+'3').checked = false;
                }
            } else {
                document.getElementById(n+'1').checked = false;
                document.getElementById(n+'2').checked = false;
                document.getElementById(n+'3').checked = false;
            }
        }
		
		function update_sector_levels() {
            var u = document.getElementById('sector_level1');
            removeOptions(u);
            var optD = document.createElement('option');
            optD.value = "";
            optD.innerHTML = "Επιλέξτε ...";
            u.appendChild(optD);

            if (document.getElementById('sector').value === "Τομέας Α - Γεωργία, Δασοκομία και Αλιεία") {
                var units = ["Φυτική και ζωική παραγωγή, θήρα και συναφείς δραστηριότητες", "Δασοκομία και υλοτομία", "Αλιεία και υδατοκαλλιέργεια"];
                for (let i = 0; i < units.length; i++) {
                    var opt = document.createElement('option');
                    opt.value = units[i];
                    opt.innerHTML = units[i];
                    u.appendChild(opt);
                }
            } else if (document.getElementById('sector').value === "Τομέας Β - Ορυχεία και Λατομεία") {
                var units = ["Εξόρυξη άνθρακα και λιγνίτη", "Αντληση αργού πετρελαίου και φυσικού αερίου", "Εξόρυξη μεταλλευμάτων", "Λοιπά ορυχεία και λατομεία", "Υποστηρικτικές δραστηριότητες εξόρυξης"];
                for (let i = 0; i < units.length; i++) {
                    var opt = document.createElement('option');
                    opt.value = units[i];
                    opt.innerHTML = units[i];
                    u.appendChild(opt);
                }
            } else if (document.getElementById('sector').value === "Τομέας Γ - Μεταποίηση") {
                var units = ["Βιομηχανία τροφίμων", "Ποτοποιία", "Παραγωγή προϊόντων καπνού", "Παραγωγή κλωστοϋφαντουργικών υλών", "Κατασκευή ειδών ένδυσης", "Βιομηχανία δέρματος και σχετικών προϊόντων από άλλα υλικά", "Βιομηχανία ξύλου και κατασκευή προϊόντων από ξύλο και φελλό, εκτός από έπιπλα κατασκευή ειδών καλαθοποιίας και σπαρτοπλεκτικής", "Χαρτοποιία και κατασκευή χάρτινων προϊόντων", "Εκτυπώσεις και αναπαραγωγή προεγγεγραμμένων μέσων", "Παραγωγή οπτάνθρακα και προϊόντων διύλισης πετρελαίου", "Παραγωγή χημικών ουσιών και προϊόντων", "Παραγωγή βασικών φαρμακευτικών προϊόντων και φαρμακευτικών σκευασμάτων", "Κατασκευή προϊόντων από ελαστικό (καουτσούκ) και πλαστικές ύλες", "Παραγωγή άλλων μη μεταλλικών ορυκτών προϊόντων", "Παραγωγή βασικών μετάλλων", "Κατασκευή μεταλλικών προϊόντων, με εξαίρεση τα μηχανήματα και τα είδη εξοπλισμού", "Κατασκευή ηλεκτρονικών υπολογιστών, ηλεκτρονικών και οπτικών προϊόντων", "Κατασκευή ηλεκτρολογικού εξοπλισμού", "Κατασκευή μηχανημάτων και ειδών εξοπλισμού π.δ.κ.α.", "Κατασκευή μηχανοκίνητων οχημάτων, ρυμουλκούμενων και ημιρυμουλκούμενων οχημάτων", "Κατασκευή λοιπού εξοπλισμού μεταφορών", "Κατασκευή επίπλων", "Άλλες μεταποιητικές δραστηριότητες", "Επισκευή, συντήρηση και εγκατάσταση μηχανημάτων και εξοπλισμού"];
                for (let i = 0; i < units.length; i++) {
                    var opt = document.createElement('option');
                    opt.value = units[i];
                    opt.innerHTML = units[i];
                    u.appendChild(opt);
                }
            } else if (document.getElementById('sector').value === "Τομέας Δ - Παροχή Ηλεκτρικού Ρεύματος, Φυσικού Αεριού, Ατμού και Κλιματισμού") {
                var units = ["Παροχή ηλεκτρικού ρεύματος, φυσικού αερίου, ατμού και κλιματισμού"];
                for (let i = 0; i < units.length; i++) {
                    var opt = document.createElement('option');
                    opt.value = units[i];
                    opt.innerHTML = units[i];
                    u.appendChild(opt);
                }
            } else if (document.getElementById('sector').value === "Τομέας Ε - Παροχή Νερού, Επεξεργασία Λυμάτων, Διαχείριση Αποβλήτων και Δραστηριότητες Εξυγίανσης") {
                var units = ["Συλλογή, επεξεργασία και παροχή νερού", "Επεξεργασία λυμάτων", "Συλλογή, ανάκτηση και διάθεση αποβλήτων", "Δραστηριότητες εξυγίανσης και άλλες υπηρεσίες για τη διαχείριση αποβλήτων"];
                for (let i = 0; i < units.length; i++) {
                    var opt = document.createElement('option');
                    opt.value = units[i];
                    opt.innerHTML = units[i];
                    u.appendChild(opt);
                }
            } else if (document.getElementById('sector').value === "Τομέας ΣΤ - Κατασκευές") {
                var units = ["Κατασκευή κτιρίων για κατοικίες και μη", "Έργα πολιτικού μηχανικού", "Εξειδικευμένες κατασκευαστικές δραστηριότητες"];
                for (let i = 0; i < units.length; i++) {
                    var opt = document.createElement('option');
                    opt.value = units[i];
                    opt.innerHTML = units[i];
                    u.appendChild(opt);
                }
            } else if (document.getElementById('sector').value === "Τομέας Ζ - Χονδρικό και Λιανικό Εμπόριο") {
                var units = ["Χονδρικό εμπόριο", "Λιανικό εμπόριο"];
                for (let i = 0; i < units.length; i++) {
                    var opt = document.createElement('option');
                    opt.value = units[i];
                    opt.innerHTML = units[i];
                    u.appendChild(opt);
                }
            } else if (document.getElementById('sector').value === "Τομέας Η - Μεταφορές και Αποθήκευση") {
                var units = ["Χερσαίες μεταφορές και μεταφορές μέσω αγωγών", "Πλωτές μεταφορές", "Αεροπορικές μεταφορές", "Αποθήκευση και υποστηρικτικές προς τη μεταφορά δραστηριότητες", "Ταχυδρομικές και ταχυμεταφορικές δραστηριότητες"];
                for (let i = 0; i < units.length; i++) {
                    var opt = document.createElement('option');
                    opt.value = units[i];
                    opt.innerHTML = units[i];
                    u.appendChild(opt);
                }
            } else if (document.getElementById('sector').value === "Τομέας Θ - Δραστηριότητες Υπηρεσιών Παροχής Καταλύματος και Υπηρεσιών Εστίασης") {
                var units = ["Καταλύματα", "Δραστηριότητες υπηρεσιών εστίασης"];
                for (let i = 0; i < units.length; i++) {
                    var opt = document.createElement('option');
                    opt.value = units[i];
                    opt.innerHTML = units[i];
                    u.appendChild(opt);
                }
            } else if (document.getElementById('sector').value === "Τομέας Ι - Δραστηριότητες Έκδοσης, Ραδιοτηλεοπτικών Μεταδόσεων και Παραγωγής και Διανομής Περιεχομένου") {
                var units = ["Εκδοτικές δραστηριότητες", "Παραγωγή κινηματογραφικών ταινιών, βίντεο και τηλεοπτικών προγραμμάτων, ηχογραφήσεις και μουσικές εκδόσεις", "Δραστηριότητες προγραμματισμού, ραδιοτηλεοπτικών εκπομπών, πρακτορείων ειδήσεων και άλλες δραστηριότητες διανομής περιεχομένου"];
                for (let i = 0; i < units.length; i++) {
                    var opt = document.createElement('option');
                    opt.value = units[i];
                    opt.innerHTML = units[i];
                    u.appendChild(opt);
                }
            } else if (document.getElementById('sector').value === "Τομέας Κ - Τηλεπικοινωνίες, Προγραμματισμός Ηλεκτρονικών Υπολογιστών, Παροχή Συμβουλών, Υπολογιστική Υποδομή και Άλλες Δραστηριότητες Υπηρεσιών Πληροφορίας") {
                var units = ["Τηλεπικοινωνίες", "Δραστηριότητες προγραμματισμού ηλεκτρονικών υπολογιστών, παροχής συμβουλών και συναφείς δραστηριότητες", "Υπολογιστική υποδομή, επεξεργασία δεδομένων, φιλοξενία και άλλες δραστηριότητες υπηρεσιών πληροφορίας"];
                for (let i = 0; i < units.length; i++) {
                    var opt = document.createElement('option');
                    opt.value = units[i];
                    opt.innerHTML = units[i];
                    u.appendChild(opt);
                }
            } else if (document.getElementById('sector').value === "Τομέας Λ - Χρηματοπιστωτικές και Ασφαλιστικές Δραστηριότητες") {
                var units = ["Δραστηριότητες χρηματοπιστωτικών υπηρεσιών, με εξαίρεση τις ασφαλιστικές δραστηριότητες και τα συνταξιοδοτικά ταμεία", "Ασφαλιστικά, αντασφαλιστικά και συνταξιοδοτικά ταμεία, εκτός από την υποχρεωτική κοινωνική ασφάλιση", "Δραστηριότητες συναφείς προς τις χρηματοπιστωτικές υπηρεσίες και τις ασφαλιστικές δραστηριότητες"];
                for (let i = 0; i < units.length; i++) {
                    var opt = document.createElement('option');
                    opt.value = units[i];
                    opt.innerHTML = units[i];
                    u.appendChild(opt);
                }
            } else if (document.getElementById('sector').value === "Τομέας Μ - Διαχείριση Ακίνητης Περιουσίας") {
                var units = ["Διαχείριση ακίνητης περιουσίας"];
                for (let i = 0; i < units.length; i++) {
                    var opt = document.createElement('option');
                    opt.value = units[i];
                    opt.innerHTML = units[i];
                    u.appendChild(opt);
                }
            } else if (document.getElementById('sector').value === "Τομέας Ν - Επαγγελματικές, Επιστημονικές και Τεχνικές Δραστηριότητες") {
                var units = ["Νομικές και λογιστικές δραστηριότητες", "Δραστηριότητες κεντρικών γραφείων και παροχής συμβουλών διαχείρισης", "Αρχιτεκτονικές δραστηριότητες και δραστηριότητες μηχανικών τεχνικές δοκιμές και αναλύσεις", "Επιστημονική έρευνα και ανάπτυξη", "Δραστηριότητες διαφήμισης, έρευνας αγοράς και δημοσίων σχέσεων", "Άλλες επαγγελματικές, επιστημονικές και τεχνικές δραστηριότητες", "Κτηνιατρικές δραστηριότητες"];
                for (let i = 0; i < units.length; i++) {
                    var opt = document.createElement('option');
                    opt.value = units[i];
                    opt.innerHTML = units[i];
                    u.appendChild(opt);
                }
            } else if (document.getElementById('sector').value === "Τομέας Ξ - Διοικητικές και Υποστηρικτικές Δραστηριότητες") {
                var units = ["Δραστηριότητες ενοικίασης και εκμίσθωσης", "Δραστηριότητες απασχόλησης", "Δραστηριότητες ταξιδιωτικών πρακτορείων, γραφείων οργανωμένων ταξιδιών και υπηρεσιών κρατήσεων και συναφείς δραστηριότητες", "Δραστηριότητες έρευνας και παροχής προστασίας", "Δραστηριότητες παροχής υπηρεσιών σε κτίρια και εξωτερικούς χώρους", "Διοικητικές δραστηριότητες γραφείου, γραμματειακή υποστήριξη και άλλες δραστηριότητες παροχής υποστήριξης προς τις επιχειρήσεις"];
                for (let i = 0; i < units.length; i++) {
                    var opt = document.createElement('option');
                    opt.value = units[i];
                    opt.innerHTML = units[i];
                    u.appendChild(opt);
                }
            } else if (document.getElementById('sector').value === "Τομέας Ο - Δημόσια Διοίκηση και Άμυνα - Υποχρεωτική Κοινωνική Ασφάλιση") {
                var units = ["Δημόσια διοίκηση και άμυνα - Υποχρεωτική κοινωνική ασφάλιση"];
                for (let i = 0; i < units.length; i++) {
                    var opt = document.createElement('option');
                    opt.value = units[i];
                    opt.innerHTML = units[i];
                    u.appendChild(opt);
                }
            } else if (document.getElementById('sector').value === "Τομέας Π - Εκπαίδευση") {
                var units = ["Εκπαίδευση"];
                for (let i = 0; i < units.length; i++) {
                    var opt = document.createElement('option');
                    opt.value = units[i];
                    opt.innerHTML = units[i];
                    u.appendChild(opt);
                }
            } else if (document.getElementById('sector').value === "Τομέας Ρ - Δραστηριότητες Σχετικές με την Ανθρώπινη Υγεία και την Κοινωνική Μέριμνα") {
                var units = ["Δραστηριότητες ανθρώπινης υγείας", "Δραστηριότητες βοήθειας κατ’ οίκον", "Δραστηριότητες κοινωνικής μέριμνας χωρίς παροχή καταλύματος"];
                for (let i = 0; i < units.length; i++) {
                    var opt = document.createElement('option');
                    opt.value = units[i];
                    opt.innerHTML = units[i];
                    u.appendChild(opt);
                }
            } else if (document.getElementById('sector').value === "Τομέας Σ - Τέχνες, Διασκέδαση και Ψυχαγωγία") {
                var units = ["Δραστηριότητες καλλιτεχνικής δημιουργίας και τεχνών του θεάματος", "Δραστηριότητες βιβλιοθηκών, αρχειοφυλακείων, μουσείων και λοιπές πολιτιστικές δραστηριότητες", "Τυχερά παιχνίδια και στοιχήματα", "Αθλητικές δραστηριότητες και δραστηριότητες διασκέδασης και ψυχαγωγίας"];
                for (let i = 0; i < units.length; i++) {
                    var opt = document.createElement('option');
                    opt.value = units[i];
                    opt.innerHTML = units[i];
                    u.appendChild(opt);
                }
            } else if (document.getElementById('sector').value === "Τομέας Τ - Άλλες Δραστηριότητες Παροχής Υπηρεσιών") {
                var units = ["Δραστηριότητες οργανώσεων", "Επισκευή και συντήρηση ηλεκτρονικών υπολογιστών, ειδών ατομικής και οικιακής χρήσης, αυτοκινήτων οχημάτων και μοτοσυκλετών", "Δραστηριότητες παροχής προσωπικών υπηρεσιών"];
                for (let i = 0; i < units.length; i++) {
                    var opt = document.createElement('option');
                    opt.value = units[i];
                    opt.innerHTML = units[i];
                    u.appendChild(opt);
                }
            } else if (document.getElementById('sector').value === "Τομέας Υ - Δραστηριότητες Νοικοκυριών ως Εργοδοτών και μη Διαφοροποιημένες Δραστηριότητες Νοικοκυριών, που Αφορούν την Παραγωγή Αγαθών -και Υπηρεσιών- για Ιδία Χρήση") {
                var units = ["Δραστηριότητες νοικοκυριών ως εργοδοτών οικιακού προσωπικού", "Μη διαφοροποιημένες δραστηριότητες ιδιωτικών νοικοκυριών, που αφορούν την παραγωγή αγαθών -και υπηρεσιών- για ίδια χρήση"];
                for (let i = 0; i < units.length; i++) {
                    var opt = document.createElement('option');
                    opt.value = units[i];
                    opt.innerHTML = units[i];
                    u.appendChild(opt);
                }
            } else if (document.getElementById('sector').value === "Τομέας Φ - Δραστηριότητες Ετερόδικων Οργανισμών και Φορέων") {
                var units = ["Δραστηριότητες ετερόδικων οργανισμών και φορέων"];
                for (let i = 0; i < units.length; i++) {
                    var opt = document.createElement('option');
                    opt.value = units[i];
                    opt.innerHTML = units[i];
                    u.appendChild(opt);
                }
            }
        }

        function update_regional_units() {
            var u = document.getElementById('regional_unit');
            removeOptions(u);
            var optD = document.createElement('option');
            optD.value = "";
            optD.innerHTML = "Επιλέξτε ...";
            u.appendChild(optD);

            if (document.getElementById('region').value === "Ανατολικής Μακεδονίας και Θράκης") {
                var units = ["Δράμας", "Έβρου", "Θάσου", "Καβάλας", "Ξάνθης", "Ροδόπης"];
                for (let i = 0; i < units.length; i++) {
                    var opt = document.createElement('option');
                    opt.value = units[i];
                    opt.innerHTML = units[i];
                    u.appendChild(opt);
                }
            } else if (document.getElementById('region').value === "Αττικής") {
                var units = ["Ανατολικής Αττικής", "Βορείου Τομέα Αθηνών", "Δυτικής Αττικής", "Δυτικού Τομέα Αθηνών", "Κεντρικού Τομέα Αθηνών", "Νήσων", "Νοτίου Τομέα Αθηνών", "Πειραιώς"];
                for (let i = 0; i < units.length; i++) {
                    var opt = document.createElement('option');
                    opt.value = units[i];
                    opt.innerHTML = units[i];
                    u.appendChild(opt);
                }
            } else if (document.getElementById('region').value === "Βορείου Αιγαίου") {
                var units = ["Ικαρίας", "Λέσβου", "Λήμνου", "Σάμου", "Χίου", "Αιτωλοακαρνανίας", "Αχαΐας", "Ηλείας"];
                for (let i = 0; i < units.length; i++) {
                    var opt = document.createElement('option');
                    opt.value = units[i];
                    opt.innerHTML = units[i];
                    u.appendChild(opt);
                }
            } else if (document.getElementById('region').value === "Δυτικής Ελλάδας") {
                var units = ["Αιτωλοακαρνανίας", "Αχαΐας", "Ηλείας"];
                for (let i = 0; i < units.length; i++) {
                    var opt = document.createElement('option');
                    opt.value = units[i];
                    opt.innerHTML = units[i];
                    u.appendChild(opt);
                }
            } else if (document.getElementById('region').value === "Δυτικής Μακεδονίας") {
                var units = ["Γρεβενών", "Καστοριάς", "Κοζάνης", "Φλώρινας"];
                for (let i = 0; i < units.length; i++) {
                    var opt = document.createElement('option');
                    opt.value = units[i];
                    opt.innerHTML = units[i];
                    u.appendChild(opt);
                }
            } else if (document.getElementById('region').value === "Ηπείρου") {
                var units = ["Άρτας", "Θεσπρωτίας", "Ιωαννίνων", "Πρέβεζας"];
                for (let i = 0; i < units.length; i++) {
                    var opt = document.createElement('option');
                    opt.value = units[i];
                    opt.innerHTML = units[i];
                    u.appendChild(opt);
                }
            } else if (document.getElementById('region').value === "Θεσσαλίας") {
                var units = ["Καρδίτσας", "Λάρισας", "Μαγνησίας", "Σποράδων", "Τρικάλων"];
                for (let i = 0; i < units.length; i++) {
                    var opt = document.createElement('option');
                    opt.value = units[i];
                    opt.innerHTML = units[i];
                    u.appendChild(opt);
                }
            } else if (document.getElementById('region').value === "Ιονίων Νήσων") {
                var units = ["Ζακύνθου", "Ιθάκης", "Κέρκυρας", "Κεφαλληνίας", "Λευκάδας"];
                for (let i = 0; i < units.length; i++) {
                    var opt = document.createElement('option');
                    opt.value = units[i];
                    opt.innerHTML = units[i];
                    u.appendChild(opt);
                }
            } else if (document.getElementById('region').value === "Κεντρικής Μακεδονίας") {
                var units = ["Ημαθίας", "Κιλκίς", "Θεσσαλονίκης", "Πέλλας", "Πιερίας", "Σερρών", "Χαλκιδικής"];
                for (let i = 0; i < units.length; i++) {
                    var opt = document.createElement('option');
                    opt.value = units[i];
                    opt.innerHTML = units[i];
                    u.appendChild(opt);
                }
            } else if (document.getElementById('region').value === "Κρήτης") {
                var units = ["Ηρακλείου", "Λασιθίου", "Ρεθύμνης", "Χανίων"];
                for (let i = 0; i < units.length; i++) {
                    var opt = document.createElement('option');
                    opt.value = units[i];
                    opt.innerHTML = units[i];
                    u.appendChild(opt);
                }
            } else if (document.getElementById('region').value === "Νοτίου Αιγαίου") {
                var units = ["Άνδρου", "Θήρας", "Καλύμνου", "Καρπάθου-Ηρωικής Νήσου Κάσου", "Κέας-Κύθνου", "Κω", "Μήλου", "Μυκόνου", "Νάξου", "Πάρου", "Ρόδου", "Σύρου", "Τήνου"];
                for (let i = 0; i < units.length; i++) {
                    var opt = document.createElement('option');
                    opt.value = units[i];
                    opt.innerHTML = units[i];
                    u.appendChild(opt);
                }
            } else if (document.getElementById('region').value === "Πελοποννήσου") {
                var units = ["Αργολίδας", "Αρκαδίας", "Κορινθίας", "Λακωνίας", "Μεσσηνίας"];
                for (let i = 0; i < units.length; i++) {
                    var opt = document.createElement('option');
                    opt.value = units[i];
                    opt.innerHTML = units[i];
                    u.appendChild(opt);
                }
            } else if (document.getElementById('region').value === "Στερεάς Ελλάδας") {
                var units = ["Βοιωτίας", "Εύβοιας", "Ευρυτανίας", "Φθιώτιδας", "Φωκίδας"];
                for (let i = 0; i < units.length; i++) {
                    var opt = document.createElement('option');
                    opt.value = units[i];
                    opt.innerHTML = units[i];
                    u.appendChild(opt);
                }
            }
        }

        function removeOptions(selectElement) {
            var i, L = selectElement.options.length - 1;
            for(i = L; i >= 0; i--) {
                selectElement.remove(i);
            }
        }

        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
        <?php if (!empty($_POST)) : ?>
            setStep(11);
        <?php endif; ?>
    </script>
</body>

</html>
