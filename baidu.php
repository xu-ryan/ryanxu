<?php
    $urls = array(
    'http://www.ryanxu.com',
    'http://www.ryanxu.com/about',
    'http://www.ryanxu.com/work',
    'http://www.ryanxu.com/contact',
    'http://www.ryanxu.com/work/dripen',
    'http://www.ryanxu.com/work/dryaa',
    'http://www.ryanxu.com/work/outap',
    'http://www.ryanxu.com/work/defacto',
    'http://www.ryanxu.com/work/typoss',
    'http://www.ryanxu.com/work/chicstall',
);
$api = 'http://data.zz.baidu.com/urls?site=www.ryanxu.com&token=4ozNB24P5NHVZ4wi';
$ch = curl_init();
$options =  array(
    CURLOPT_URL => $api,
    CURLOPT_POST => true,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POSTFIELDS => implode("\n", $urls),
    CURLOPT_HTTPHEADER => array('Content-Type: text/plain'),
);
curl_setopt_array($ch, $options);
$result = curl_exec($ch);
echo $result;

?>