
<?php

$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://api.twelvedata.com/time_series?symbol=AAPL&interval=1min&apikey=b97f7b50dc174277b53d47a5a422f80e",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
    
	$data = json_decode($response, true)['values'];
    echo json_encode($data, JSON_PRETTY_PRINT);
}
    