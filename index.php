<!doctype html>
<html>
<head>
    <?php ini_set('xdebug.var_display_max_depth', 5); ?>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="display-4">
                    Given the Data:
                </div>
                <?php
                    // Create the sample data.
                    $data = [
                        // First by week.
                        '13 Jun 2011' => [
                            // Then by day.
                            'Monday' => [[
                                // Finally by market.
                                'market' => 'austin',
                                'impressions' => 123456
                            ], [
                                'market' => 'atlanta',
                                'impressions' => 456124
                            ]],
                            'Thursday' => [[
                                'market' => 'atlanta',
                                'impressions' => 456789
                            ], [
                                'market' => 'austin',
                                'impressions' => 456788
                            ]],
                            'Friday' => [[
                                'market' => 'austin',
                                'impressions' => 123457
                            ], [
                                'market' => 'atlanta',
                                'impressions' => 456123
                            ]]
                        ],
                        '20 Jun 2011' => [
                            'Monday' => [[
                                'market' => 'austin',
                                'impressions' => 123456
                            ], [
                                'market' => 'atlanta',
                                'impressions' => 456124
                            ]],
                            'Tuesday' => [[
                                'market' => 'atlanta',
                                'impressions' => 456789
                            ], [
                                'market' => 'austin',
                                'impressions' => 456788
                            ]],
                            'Thursday' => [[
                                'market' => 'austin',
                                'impressions' => 123457
                            ], [
                                'market' => 'atlanta',
                                'impressions' => 456123
                            ]]
                        ]
                    ];
                ?>

                <pre><?= var_dump($data) ?></pre>
            </div>
            <div class="col">
                <div class="display-4">
                    Faceted and Sorted:
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Week Of</td>
                            <th scope="col">Day</td>
                            <th scope="col">Impressions</td>
                            <th scope="col">Market</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $week => $documents) { ?>
                            <?php $nWeek = 0; ?>
                            <?php foreach ($documents as $day => $records) { ?>
                                <?php
                                    // Sort the day by impressions.
                                    usort($records, function ($a, $b) {
                                        return $b['impressions'] - $a['impressions'];
                                    });
                                    $nDay = 0;
                                ?>
                                <?php foreach ($records as $entry) { ?>
                                    <tr>
                                        <th scope="row"><?= $nWeek === 0 ? $week : '' ?></th>
                                        <th scope="row"><?= $nDay === 0 ? $day : '' ?></th>
                                        <td><?= $entry['impressions'] ?></td>
                                        <td><?= $entry['market'] ?></td>
                                    </tr>
                                    <?php
                                        $nWeek += 1;
                                        $nDay += 1;
                                    ?>
                                <?php } ?>
                            <?php } ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
