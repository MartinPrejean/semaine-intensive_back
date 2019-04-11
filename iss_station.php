<?php $title = 'ISS STATION';?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <title><?php echo($title); ?></title>
    <meta name="description" content="Semaine Intensive Back">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Abel" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="styles/style.css">
    <link rel="shortcut icon" href="content/favicon.png">
</head>
<body>
    <div class="container_test">
        <?php include "templates/nav-bar.php";?>

        <div class="container_introduction">
            <div class="iss_subtitle">International Space Station <br>Timeline</div>
            <div class="iss_text_introduction">The International Space Station is a space station in low<br>Earth orbit, permanently occupied by an international<br>crew dedicated to scientific research in the space environment.</div>
            <div class="iss_caracteristique">
                <span class="grey_color">Speed : </span> 27.600 km/h <br>
                <span class="grey_color">Weight : </span> 420 tons <br>
                <span class="grey_color">Distance : </span> 408 km <br>
            </div>
        </div>

        <div class="container_timeline">
            <div class="container_date">
                <div class="container_picture">
                    <img src="images/directeur.png" alt="#">
                </div>
                <div class="container_description_timeline">
                    <div class="date">1984</div>
                    <div class="line_style"></div>
                    <div class="subtitle">President Reagan directs <br>NASA to build the ISS</div>
                    <div class="text">President Ronald Reagan’s State of the Union Address directs NASA to build an international space station within the next 10 years</div>
                </div>
            </div>

            <div class="container_date_reverse">
                <div class="container_picture">
                    <img src="images/fusee.png" alt="#">
                </div>
                <div class="container_description_timeline_reverse">
                    <div class="date_reverse">1998</div>
                    <div class="line_style_reverse"></div>
                    <div class="subtitle_reverse">First ISS Segment Launches</div>
                    <div class="text_reverse">The first segment of the ISS launches : a Russian proton rocket named Zarya (“sunrise”)</div>
                </div>
            </div>

            <div class="container_date">
                <div class="container_picture">
                    <img src="images/astronautes.png" alt="#">
                </div>
                <div class="container_description_timeline">
                    <div class="date">2000</div>
                    <div class="line_style"></div>
                    <div class="subtitle">First Crew to Reside on Station</div>
                    <div class="text">Astronaut Bill Sheperd and cosmonauts Yuri Gidzenko and Sergei Krikalev become the first crew to reside onboard the station, staying several months.</div>
                </div>
            </div>

            <div class="container_date_reverse">
                <div class="container_picture">
                    <img src="images/iss_zoom.png" alt="#">
                </div>
                <div class="container_description_timeline_reverse">
                    <div class="date_reverse">2005</div>
                    <div class="line_style_reverse"></div>
                    <div class="subtitle_reverse">U.S. Lab Module Recognized as Newest U.S. National Laboratory</div>
                    <div class="text_reverse">Congress designates the U.S. portion of the ISS as the nation’s newest national laboratory to maximize its use for other U.S. government agencies and for academic and private institutions.</div>
                </div>
            </div>

            <div class="container_date">
                <div class="container_picture">
                    <img src="images/iss_work.png" alt="#">
                </div>
                <div class="container_description_timeline">
                    <div class="date">2008</div>
                    <div class="line_style"></div>
                    <div class="subtitle">European Lab Joins the ISS</div>
                    <div class="text">The European Space Agency’s Columbus Laboratory becomes part of the station.</div>
                </div>
            </div>

            <div class="container_date_reverse">
                <div class="container_picture">
                    <img src="images/satelite_space.png" alt="#">
                </div>
                <div class="container_description_timeline_reverse">
                    <div class="date_reverse">2008</div>
                    <div class="line_style_reverse"></div>
                    <div class="subtitle_reverse">Japanese Lab Joins the ISS</div>
                    <div class="text_reverse">The first Japanese Kibo laboratory module becomes part of the station.</div>
                </div>
            </div>

            <div class="container_date">
                <div class="container_picture">
                    <img src="images/iss_station.png" alt="#">
                </div>
                <div class="container_description_timeline">
                    <div class="date">2010</div>
                    <div class="line_style"></div>
                    <div class="subtitle">ISS 10-year Anniversary</div>
                    <div class="text">The ISS celebrates its 10-year anniversary of continuous human occupation. Since Expedition 1 in the fall of 2000, 202 people had visited the station.</div>
                </div>
            </div>

            <div class="container_date_reverse">
                <div class="container_picture">
                    <img src="images/nasa.png" alt="#">
                </div>
                <div class="container_description_timeline_reverse">
                    <div class="date_reverse">2011</div>
                    <div class="line_style_reverse"></div>
                    <div class="subtitle_reverse">NASA Issues Cooperative Agreement</div>
                    <div class="text_reverse">NASA issues a cooperative agreement notice for a management partner.</div>
                </div>
            </div>

            <div class="container_date">
                <div class="container_picture">
                    <img src="images/iss_logo.png" alt="#">
                </div>
                <div class="container_description_timeline">
                    <div class="date">2011</div>
                    <div class="line_style"></div>
                    <div class="subtitle">NASA selects the ISS National Lab</div>
                    <div class="text">NASA selects the Center for the Advancement of Science in Space to manage the ISS National Lab.</div>
                </div>
            </div>

            <div class="container_date_reverse">
                <div class="container_picture">
                    <img src="images/fusee.png" alt="#">
                </div>
                <div class="container_description_timeline_reverse">
                    <div class="date_reverse">2013</div>
                    <div class="line_style_reverse"></div>
                    <div class="subtitle_reverse">The First ISS National Lab Research Flight</div>
                    <div class="text_reverse">Proteins can be grown as crystals in space with nearly perfect three-dimensional structures useful for the development of new drugs. The ISS National L’ab’s protein crystal growth (PCG) series of flights began in 2013, allowing researchers to utilize the unique environment of the ISS.</div>
                </div>
            </div>
        </div>
        <?php include 'templates/footer.php'; ?> 
    </div>
</body>
</html>