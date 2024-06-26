<?php include("path.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>cybersport dota</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Подключение Font Awesome CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
<?php include("app/include/header.php"); ?>
<h2 class="slider-title">Топ Команди</h2>
<div class="template-box">
    <img class="team-logo" src="assets/img/Screenshot_1.png"  WIDTH="150" HEIGHT="204" alt="PSG.LGD">
    <div class="team-name">PSG.LGD</div>
    <div class="team-members">
        <ul>
            <li>1  Ame</li>
            <li>2 NothingToSay</li>
            <li>3  Faith_bian</li>
            <li>4  XinQ</li>
            <li>5  y</li>
            <li> xiao8</li>
        </ul>
        <p>1st The International 2015 (2015)</p>
    </div>
</div>

<div class="template-box">
    <img class="team-logo" src="assets/img/Screenshot_7.png" alt="OG">
    <div class="team-name">OG</div>
    <div class="team-members">
        <ul>
            <li> SumaiL</li>
            <li> Topson</li>
            <li>Ceb</li>
            <li>Macedonia Saksa</li>
            <li>N0tail</li>
            <li> Misha</li>
        </ul>
        <p>1st The International 2019 (2019)</p>
    </div>
</div>

<div class="template-box">
    <img class="team-logo" src="assets/img/Screenshot_3.png"  alt="Team Spirit">
    <div class="team-name">Team Spirit</div>
    <div class="team-members">
        <ul>
            <li> Yatoro</li>
            <li>TORONTOTOKYO</li>
            <li> Collapse</li>
            <li> Mira </li>
            <li> Miposhka</li>
            <li> Silent</li>
        </ul>
        <p>5th-6th The International 2021 (2021)</p>
    </div>
</div>

<div class="template-box">
    <img class="team-logo" src="assets/img/Screenshot_4.png"  alt="Fnatic">
    <div class="team-name">Fnatic</div>
    <div class="team-members">
        <ul>
            <li> Raven</li>
            <li> ChYuan</li>
            <li> Deth</li>
            <li> Jabz</li>
            <li> DJ</li>
            <li> SunBhie</li>
        </ul>
        <p>4th The International 2016 (2016)</p>
    </div>
</div>

<div class="template-box">
    <img class="team-logo" src="assets/img/Screenshot_6.png"  alt="Team Secret">
    <div class="team-name">Team Secret</div>
    <div class="team-members">
        <ul>
            <li> MATUMBAMAN</li>
            <li> Nisha</li>
            <li> zai</li>
            <li> YapzOr</li>
            <li> Puppey</li>
            <li> Heen</li>
        </ul>
        <p>4th The International 2019 (2019)</p>
    </div>
</div>

<div class="template-box">
    <img class="team-logo" src="assets/img/Screenshot_5.png"  alt="Alliance">
    <div class="team-name">Alliance</div>
    <div class="team-members">
        <ul>
            <li> Nikobaby</li>
            <li> LIMMP</li>
            <li> s4</li>
            <li> Handsken</li>
            <li> fng</li>
        </ul>
        <p>1st The International 2013 (2013)</p>
    </div>
</div>



<div class="template-box">
    <img class="team-logo"  src="assets/img/Screenshot_2.png" alt="Alliance">
    <div class="team-name">Gaimin Gladiators</div>
    <div class="team-members">
        <ul>
            <li> Nikobaby</li>
            <li> LIMMP</li>
            <li> s4 </li>
            <li> Handsken</li>
            <li> fng </li>
        </ul>
        <p>1st The International 2013 (2013)</p>
    </div>
</div>







</body>
</html>




<script>
    document.querySelectorAll('.template-box').forEach(box => {
        const members = box.querySelector('.team-members');
        const logo = box.querySelector('.team-logo');

        function showMembers() {
            members.style.display = 'block';
            logo.style.display = 'none';
        }

        function hideMembers() {
            members.style.display = 'none';
            logo.style.display = 'block';
        }

        box.addEventListener('mouseover', showMembers);
        box.addEventListener('mouseout', hideMembers);
    });


</script>
<?php include("app/include/footer.php"); ?>
</body>
</html>


