<?php
$url = "https://data.bmkg.go.id/DataMKG/MEWS/DigitalForecast/DigitalForecast-DIYogyakarta.xml";
$data = new SimpleXMLElement($url, null, true);

//echo "<pre>"; print_r ($result);
echo "<h2>LIST OF DATA BMKG</h2>";
$attributes = $data->attributes();
$source = $attributes['source'];
$productioncenter = $attributes['productioncenter'];

echo "<p>Source: $source</p>";
echo "<p>Production Center: $productioncenter</p>";

$forecast = $data->forecast;
$areas = $forecast->area;

echo "<table border='1'>";
echo "<tr>";
echo "<th>Area ID</th>";
echo "<th>Description</th>";
echo "<th>Parameter ID</th>";
echo "<th>Parameter Description</th>";
echo "<th>Type</th>";
echo "<th>Hour</th>";
echo "<th>Datetime</th>";
echo "<th>Value</th>";
echo "</tr>";

foreach ($areas as $area) {
    $id = $area['id'];
    $description = $area->description;

    foreach ($area->parameter as $parameter) {
        $parameter_id = $parameter['id'];
        $parameter_description = $parameter['description'];

        foreach ($parameter->timerange as $timerange) {
            $type = $timerange['type'];
            $h = $timerange['h'];
            $datetime = $timerange['datetime'];
            $value = $timerange->value;

            echo "<tr>";
            echo "<td>$id</td>";
            echo "<td>$description</td>";
            echo "<td>$parameter_id</td>";
            echo "<td>$parameter_description</td>";
            echo "<td>$type</td>";
            echo "<td>$h</td>";
            echo "<td>$datetime</td>";
            echo "<td>$value</td>";
            echo "</tr>";
        }
    }
}

echo "</table>";
?>