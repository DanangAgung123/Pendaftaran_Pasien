<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV Responsive</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            background-color: #ddd;
            font-size: 18px;
            font-family: Arial, Helvetica, sans-serif;
        }

        .container {
            width: 60%;
            margin: 50px auto;
            border: 5px solid #333;
            box-sizing: border-box;
            padding: 5px;
            display: grid;
            grid-template-columns: 1fr 2fr;
            grid-template-rows: repeat(3, auto);
        }

        /* Foto */
        .foto {
            background-color: #ddd;
            display: flex;
            justify-content: center;
            padding-top: 5px;
        }

        .profiltext .imgbx {
            position: relative;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            overflow: hidden;
            
        }

        .profiltext .imgbx img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        


        /* Akhir Foto */
        /* Nama */
        .nama {
            background-color: #ffffff;
            display: flex;
            align-items: center;
            padding-left: 10px;
            width: 100%;
            box-sizing: border-box;
        }
        .judul{
            text-align: center;
            font-size: 70px;
        }
     

        /* Akhir Nama */

        /* Contact */
        .contact {
            background-color: #ddd;
            padding: 10px;
            width: 100%;
            display: flex;
            flex-direction: column;
            box-sizing: border-box;
        }
        .judul2{
            margin: 10px;
        }
        .p1{
            margin: 10px;
        }

        /* Akhir Contact */

        /* Profile */
        .profile {
            background-color: #ffffff;
            padding: 15px;
            display: flex;
            flex-direction: column;
            width: 100%;
            box-sizing: border-box;
        }
        .profile p{
            text-indent: 40px;
            text-align:justify;
            line-height: 25px;
        }

        /* Akhir Profile */

        /* Skill */
        .skill {
            background-color:#ddd;
            width: 100%;
            display: flex;
            flex-direction: column;
            box-sizing: border-box;
            padding: 20px;
        }
        .list{
            list-style-type: none;
            padding: 5px;
        }
        .skill h2{
            margin: 10px 5px;
        }
        /* Akhir Skill */

        /* Education */
        .pendidikan {
            background-color: #ffffff;
            width: 100%;
            display: flex;
            flex-direction: column;
            box-sizing: border-box;
            padding: 20px;
        }
        .list{
            list-style-type: none;
            padding: 5px;
        }
        .pendidikan h2{
            margin: 10px 5px;
        }
        /* Akhir Education */

        /* Responsive Breakpoint */

        @media(max-width:900px) {
            .container {
                grid-template-columns: 1fr;

            }
            .foto,.contact,.nama,.pendidikan,.profile,.skill{
                background-color: #ffffff;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="foto">
            <div class="profiltext">
                <div class="imgbx">
                    <img src="source/foto.jpg">
                </div>
            </div>
        </div>
        <div class="nama"><h2 class="judul">Danang Agung Nugroho</h2></div>
        <div class="contact">
            <h2 class="judul2">Contact Info</h2>
            <p class="p1"><i class="material-icons icons1">call</i>+62-857-5562-0874</p>
			<p class="p1"><i class="material-icons icons1">email</i><a href="">danangagungnugh@gmail.com</a></p>
			<p class="p1"><i class="material-icons icons1">facebook</i><a href="https://www.instagram.com/ndanangagung/">Instagram</a></p>
        </div>
        <div class="profile">
            <h2 class="judul2"> Profile</h2>
            <p>Memiliki ketertarikan dalam kegiatan hitung menghitung.
                    Memiliki sertifikat IAI sewaktu di SMKN 1 Kota Probolinggo.
                    Mampu mengoperasikan Microsoft Office, Microsoft Excel, Microxoft Power point,
                    serta pernah mengoperasikan Myob Accounting.
                    Mampu menjalankan pemograman sederhana menggunakan Microsoft Visual Foxpro.</p>
        </div>
        <div class="skill">
				<h2>Keahlian</h2>
				<ul>
                    <li class="list">Teknologi WEB: Html, CSS</li>
                    <li class="list">Akuntansi Keuangan</li>
                    <li class="list">Pemecahan Masalah dan ahli analis</li>
                </ul>
        </div>
        <div class="pendidikan">
        <h2>Pendidikan</h2>
				<ul>
                    <li class="list">SMKN 1 Kota Probolinggo (2019-2022)</li>
                    <li class="list">AMIK TARUNA Probolinggo (2022-Sekarang)</li>
                </ul>
        </div>
    </div>

</body>

</html>