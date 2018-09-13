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
                        // Facet by week.
                        '13 Jun 2011' => [[
                            'market' => 'austin',
                            'impressions' => 123456,
                            'date' => 'monday'
                        ], [
                            'market' => 'atlanta',
                            'impressions' => 456124,
                            'date' => 'monday'
                        ], [
                            'market' => 'atlanta',
                            'impressions' => 456789,
                            'date' => 'thursday'
                        ], [
                            'market' => 'austin',
                            'impressions' => 456788,
                            'date' => 'thursday'
                        ], [
                            'market' => 'austin',
                            'impressions' => 123457,
                            'date' => 'tuesday'
                        ], [
                            'market' => 'atlanta',
                            'impressions' => 456123,
                            'date' => 'friday'
                        ]],
                        '20 Jun 2011' => [[
                            'market' => 'austin',
                            'impressions' => 123456,
                            'date' => 'monday'
                        ], [
                            'market' => 'atlanta',
                            'impressions' => 456124,
                            'date' => 'monday'
                        ], [
                            'market' => 'atlanta',
                            'impressions' => 456789,
                            'date' => 'tuesday'
                        ], [
                            'market' => 'austin',
                            'impressions' => 456788,
                            'date' => 'tuesday'
                        ], [
                            'market' => 'austin',
                            'impressions' => 123457,
                            'date' => 'thursday'
                        ], [
                            'market' => 'atlanta',
                            'impressions' => 456123,
                            'date' => 'friday'
                        ]]
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
                            <th scope="col">Impressions</td>
                            <th scope="col">Day</td>
                            <th scope="col">Market</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $week => $documents) { ?>
                            <?php
                                // Sort the day by impressions.
                                usort($documents, function ($a, $b) {
                                    return $b['impressions'] - $a['impressions'];
                                });

                                // Only show week date once per document group.
                                $nWeek = 0;
                            ?>
                            <?php foreach ($documents as $entry) { ?>
                                <tr>
                                    <th scope="row"><?= $nWeek === 0 ? $week : '' ?></th>
                                    <td><?= $entry['impressions'] ?></td>
                                    <td><?= $entry['date'] ?></td>
                                    <td><?= $entry['market'] ?></td>
                                </tr>
                                <?php $nWeek += 1 ?>
                            <?php } ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
