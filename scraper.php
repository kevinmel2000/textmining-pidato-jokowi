<?php

require 'vendor/autoload.php';
use Goutte\Client;

$url_base = "http://setkab.go.id/category/transkrip-pidato/page/";
$url_array = [];
$content_array = [];
$max_page = 20;

function collectLink($url, $client){
	printf("Start collecting links from %s ...\n", $url);
	$crawler = $client->request('GET', $url);
	$output = $crawler->filter("div.loop-box-content > h2 > a")->extract("href");
	printf("Finished collecting links from %s.\n\n", $url);
	return $output;
}

function collectContent($url, $client){
	printf("Start collecting content from %s ...\n",$url);
	$crawler = $client->request('GET', $url);
	$output = $crawler->filter("div.content-block")->extract("_text");
	printf("Finished collecting content from %s.\n\n", $url);
	return $output;
}

//iteration to collect all links
$http_client = new Client();
for ($i = 1; $i <= $max_page; $i++) {
	$url_search = $url_base . strval($i);
	$links = collectLink($url_search, $http_client);
	$url_array = array_merge($url_array,$links);
}

//iteration to collect all contents and write it to file
$file = fopen("transkrip-pidato.csv","w");
for ($i = 1; $i <= sizeof($url_array); $i++) {
	$article = collectContent($url_array[$i], $http_client);
	fputcsv($file,explode(',', $article[0]));
}
fclose($file);
