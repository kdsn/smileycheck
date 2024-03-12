<?php
require_once __DIR__ . '/Database.php';


$db = new Database();
$conn = $db->getConnection();


// Testdata
$testData = [
    'navnelbnr' => 99999, // Use a unik test 'navnelbnr'
    'cvrnr' => 12345678,
    'pnr' => 1234567890,
    'brancheKode' => 'TestKode',
    'branche' => 'Testbranche',
    'virksomhedstype' => 'Test',
    'navn1' => 'Test Virksomhed',
    'adresse1' => 'Testvej 1',
    'postnr' => 1000,
    'city' => 'Testby',
    'seneste_kontrol' => 1,
    'seneste_kontrol_dato' => '2022-01-01 00:00:00',
    'naestseneste_kontrol' => 1,
    'naestseneste_kontrol_dato' => '2021-01-01 00:00:00',
    'tredjeseneste_kontrol' => 1,
    'tredjeseneste_kontrol_dato' => '2020-01-01 00:00:00',
    'fjerdeseneste_kontrol' => 1,
    'fjerdeseneste_kontrol_dato' => '2019-01-01 00:00:00',
    'URL' => 'http://test.com',
    'reklame_beskyttelse' => 0,
    'Elite_Smiley' => 1,
    'Kaedenavn' => 'Testkæde',
    'Pixibranche' => 'Test Pixibranche'
];

// Indsæt testdata
$insertSql = "REPLACE INTO virksomheder VALUES (:navnelbnr, :cvrnr, :pnr, :brancheKode, :branche, :virksomhedstype, :navn1, :adresse1, :postnr, :city, :seneste_kontrol, :seneste_kontrol_dato, :naestseneste_kontrol, :naestseneste_kontrol_dato, :tredjeseneste_kontrol, :tredjeseneste_kontrol_dato, :fjerdeseneste_kontrol, :fjerdeseneste_kontrol_dato, :URL, :reklame_beskyttelse, :Elite_Smiley, :Kaedenavn, :Pixibranche)";
$stmt = $conn->prepare($insertSql);
$stmt->execute($testData);

// Opdater testdata (ændr f.eks. 'seneste_kontrol_dato')
$updateData = ['seneste_kontrol_dato' => '2024-02-14 00:00:00', 'navnelbnr' => $testData['navnelbnr']];
$updateSql = "UPDATE virksomheder SET seneste_kontrol_dato = :seneste_kontrol_dato WHERE navnelbnr = :navnelbnr";
$stmt = $conn->prepare($updateSql);
$stmt->execute($updateData);

// Hent og vis testpost
$selectSql = "SELECT * FROM virksomheder WHERE navnelbnr = ?";
$stmt = $conn->prepare($selectSql);
$stmt->execute([$testData['navnelbnr']]);
$post = $stmt->fetch(PDO::FETCH_ASSOC);

echo "Hentet post:\n";
print_r($post);