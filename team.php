<?php include("path.php"); ?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>cybersport dota</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<?php include("app/include/header.php"); ?>

<h2 class="slider-title">Топ Команди</h2>

<?php
$teams = [
    ['name' => 'PSG.LGD', 'img' => 'assets/img/Screenshot_1.png', 'members' => ['Ame', 'NothingToSay', 'Faith_bian', 'XinQ', 'y', 'xiao8'], 'title' => '1st The International 2015 (2015)'],
    ['name' => 'OG', 'img' => 'assets/img/Screenshot_7.png', 'members' => ['SumaiL', 'Topson', 'Ceb', 'Macedonia Saksa', 'N0tail', 'Misha'], 'title' => '1st The International 2019 (2019)'],
    ['name' => 'Team Spirit', 'img' => 'assets/img/Screenshot_3.png', 'members' => ['Yatoro', 'TORONTOTOKYO', 'Collapse', 'Mira', 'Miposhka', 'Silent'], 'title' => '5th-6th The International 2021 (2021)'],
    ['name' => 'Fnatic', 'img' => 'assets/img/Screenshot_4.png', 'members' => ['Raven', 'ChYuan', 'Deth', 'Jabz', 'DJ', 'SunBhie'], 'title' => '4th The International 2016 (2016)'],
    ['name' => 'Team Secret', 'img' => 'assets/img/Screenshot_6.png', 'members' => ['MATUMBAMAN', 'Nisha', 'zai', 'YapzOr', 'Puppey', 'Heen'], 'title' => '4th The International 2019 (2019)'],
    ['name' => 'Alliance', 'img' => 'assets/img/Screenshot_5.png', 'members' => ['Nikobaby', 'LIMMP', 's4', 'Handsken', 'fng'], 'title' => '1st The International 2013 (2013)'],
    ['name' => 'Gaimin Gladiators', 'img' => 'assets/img/Screenshot_2.png', 'members' => ['Nikobaby', 'LIMMP', 's4', 'Handsken', 'fng'], 'title' => '1st The International 2013 (2013)']
];

foreach ($teams as $team) {
    echo '<div class="template-box">
            <img class="team-logo" src="' . $team['img'] . '" alt="' . $team['name'] . '" width="150" height="204">
            <div class="team-name">' . $team['name'] . '</div>
            <div class="team-members">
                <ul>';
    foreach ($team['members'] as $member) {
        echo '<li>' . $member . '</li>';
    }
    echo '</ul>
            <p>' . $team['title'] . '</p>
        </div>
    </div>';
}
?>

<script>
    document.querySelectorAll('.template-box').forEach(box => {
        const members = box.querySelector('.team-members');
        const logo = box.querySelector('.team-logo');

        function toggleMembers() {
            members.style.display = members.style.display === 'block' ? 'none' : 'block';
            logo.style.display = logo.style.display === 'block' ? 'none' : 'block';
        }

        box.addEventListener('mouseover', toggleMembers);
        box.addEventListener('mouseout', toggleMembers);
    });
</script>

<?php include("app/include/footer.php"); ?>
</body>
</html>
