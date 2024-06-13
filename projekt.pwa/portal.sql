-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2024 at 12:06 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL,
  `ime` varchar(32) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `prezime` varchar(32) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `korisnicko_ime` varchar(32) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `lozinka` varchar(255) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `razina` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `ime`, `prezime`, `korisnicko_ime`, `lozinka`, `razina`) VALUES
(1, 'roko', 'nekic', 'roko12', '$2y$10$kYoSZjBu5a7QOE3PZBa72uA6SiyDo8JFN.XY4ehX1pP.8ANLHBAFe', 1),
(2, 'Roko', 'Nekić', 'rokoko', '$2y$10$kE3eqs0QqtWBYLoASdwOBuj6rDxXA8ctIunaiIEBb3D/oulhUElmy', 0),
(3, 'ewfewae', 'fdsgaafds', 'goofy', '$2y$10$o8mkXxpm9xd37QT2lsriju998ItusINeZ7B8RtyHSFvRlC/nV8EDS', 0),
(4, 'roko', 'nekic', 'rokonek', '$2y$10$1Xj8.WYw.AkxsXmiszwUh.tYidRh6CD190wjt1goknKpUOx2P0WWm', 0);

-- --------------------------------------------------------

--
-- Table structure for table `unos`
--

CREATE TABLE `unos` (
  `id` int(11) NOT NULL,
  `datum` varchar(32) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `naslov` varchar(64) CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `sazetak` text CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `tekst` text CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `slika` varchar(64) CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `kategorija` varchar(64) CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `arhiva` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `unos`
--

INSERT INTO `unos` (`id`, `datum`, `naslov`, `sazetak`, `tekst`, `slika`, `kategorija`, `arhiva`) VALUES
(2, '2024-06-Tue', 'Prvi predsjednik Slovenije', 'MILAN Kučan, prvi slovenski predsjednik i bivši šef komunista u Sloveniji, dao je intervju', 'MILAN Kučan, prvi slovenski predsjednik i bivši šef komunista u Sloveniji, dao je intervju za Klix.ba. Govorio je i o razdoblju raspada bivše Jugoslavije te borbi za neovisnost.\r\n\r\nTvrdi da je Jugoslavija \"umjetna tvorevina, nastala u posebnim povijesnim prilikama koje su pogodovale stvaranju takvog konglomerata na ovom prostoru.\" Priznaje da su postojale nacionalne, kulturne, religijske, civilizacijske i povijesne razlike. \r\n\r\n\"Dok je bilo interesa za zajednički život, a tih interesa bilo je puno, tražio se uvijek mehanizam i procedure preko kojih te razlike ne bi bile razorne, ne bi bile kobne po postojanje te države. Ali kako su se mijenjale prilike unutar zemlje i u međunarodnoj zajednici, takva zemlja uvijek je morala tražiti odgovor na sve te nove izazove. I dok je to Jugoslavija bila u stanju, to je funkcioniralo\", kazao je. \r\n\r\n\"JNA nije mogla biti faktor integracije\"\r\nKao ključne integrativne faktore važne za ostanak Jugoslavije navodi ličnost Josipa Broza Tita, ideologiju, Jugoslavensku armiju i partiju. \r\n\r\n\"Integrativni faktori su počeli slabiti. Tita nije bilo. Ideologija koja je udarila u logiku jednog liberalizma i parlamentarne demokracije više nije imala tu snagu. Raspalo se tržište. Partija se raspala na 14. kongresu, kad je naša delegacija otišla\", prisjetio se. \r\n\r\n\"Ostala je JNA, a takva armija u višenacionalnoj zajednici, koja je sastavljena iz pripadnika svih tih naroda, ne može niti u jednoj zemlji biti faktor integracije. Ona je to pokušavala biti, ali je završila tako što je započela ratove, nažalost, prvo protiv Slovenije, onda protiv Hrvatske, a pogotovo protiv BiH\", dodao je. \r\n\r\nSmatra da je adekvatna alternativa u tom trenutku bila \"osamostaljenje na principu udruživanja.\" \"Kako se Jugoslavija udružila, tako se trebalo razdružiti\", uvjeren je. Kaže kako je bio svjestan opasnosti od nasilnog raspada. ', 'slovenac.jpg', 'politika', 0),
(3, '2024-06-Tue', 'Milanović odaje dojam ', 'NOVI glavni državni odvjetnik Ivan Turudić gostovao je u emisiji \"1 na 1\" na HRT-u.', 'NOVI glavni državni odvjetnik Ivan Turudić gostovao je u emisiji \"1 na 1\" na HRT-u. Govorio je o svojim motivima za prihvaćanje nove dužnosti i odnosima s politikom. \"Dosta sam prošao u karijeri, živimo u turbulentnom vremenu i bio je to izazov, a temeljni motiv bio je opće dobro\", poručio je.\r\n\r\n\"Teško je razgraničiti Državno odvjetništvo Republike Hrvatske (DORH) od sudstva, državno odvjetništvo je drugačije nego što su sudovi, ali to je zapravo zakon spojenih posuda - ne može biti dobra situacija u sudu, a loša u DORH-u i obrnuto. Sud i DORH dvije su institucije koje su međuovisne i isprepliću se u brojnim situacijama\", istaknuo je. \r\n\r\n\r\n\r\n', 'turudic.jpeg', 'politika', 0),
(4, '2024-06-Tue', 'UN-ove rezolucije o Gazi', 'EGIPATSKI ministar vanjskih poslova Sameh Šukri i njegov jordanski kolega Ajman Safadi ', 'EGIPATSKI ministar vanjskih poslova Sameh Šukri i njegov jordanski kolega Ajman Safadi pozvali su Izrael da se pridržava rezolucije Vijeća sigurnosti Ujedinjenih naroda koja se tiče plana o okončanju rata u Gazi.\r\n\r\nGovoreći na zajedničkoj konferenciji za medije u Jordanu u utorak, Safadi je rekao da je vjerodostojnost međunarodnog prava na kocki ako se Izrael odbije pridržavati rezolucije.\r\n\r\n\"Sve dok Izrael nastavlja agresiju, postaje sve izopćenija država\", dodao je Safadi.\r\n\r\nŠukri je također rekao da je rezolucija Vijeća sigurnosti \"obvezna i da se mora poštivati.\"\r\n\r\nVijeće sigurnosti Ujedinjenih naroda u ponedjeljak je poduprlo plan koji je iznio američki predsjednik Joe Biden za prekid vatre između Izraela i Hamasa u Pojasu Gaze.\r\n\r\nRezoluciju su pozdravili i Hamas i suparnička Palestinska samouprava predsjednika Mahmuda Abasa.', 'jordan.jpg', 'politika', 0),
(5, '2024-06-Tue', 'Hrvatski golman', 'NEDILJKO LABROVIĆ (24) je novi igrač njemačkog bundesligaša Augsburga', 'NEDILJKO LABROVIĆ (24) je novi igrač njemačkog bundesligaša Augsburga s kojim je potpisao ugovor na pet godina. \"Oduševljeni smo što možemo objaviti potpisivanje petogodišnjeg ugovora s Nediljkom Labrovićem do 2029. godine. Hrvatski reprezentativac rođen u Splitu pridružit će nam se iz svog sadašnjeg kluba HNK Rijeka. Uzbuđeni smo što te imamo!\", objavio je njemački klub na društvenim mrežama.\r\n\r\nTočan iznos transfera nije objavljen, ali se prema izvorima bliskim Rijeci radi o tri milijuna eura. Labrović će postati četvrti najviše plaćeni vratar koji je transferiran iz SuperSport HNL-a. Na vrhu je Dominik Livaković, koji je za 6.65 milijuna eura prošlo ljeto napustio Dinamo i otišao u Fenerbahče. Na drugom mjestu je Ivo Grbić, za kojeg je Atletico Madrid 2020. platio 3.5 milijuna eura, a na trećem Lovre Kalinić, koji je 2016. za 3.1 milijun eura napustio Hajduk i otišao u belgijski Gent.\r\n\r\nPropustio je trening reprezentacije radi potpisa ugovora\r\nHrvatski golman je danas, uz dozvolu izbornika Zlatka Dalića, propustio trening hrvatske reprezentacije koja se priprema za prvu utakmicu Europskog prvenstva protiv Španjolske kako bi otišao u Augsburg i dovršio transfer života te tako postao suigrač Diona Drene Belje i Kristijana Jakića.\r\n\r\nPriključio se Rijeci u ljeto 2021. godine kao besplatan igrač nakon što mu je istekao ugovor u Šibeniku, što je ispalo sjajno i za njega i za klub. Rijeka iza sebe ima odličnu sezonu, a njezin vratar i kapetan bio je jedan od glavnih oslonaca momčadi. Ustalio se i u reprezentaciji Hrvatske, pozvan je za svaku akciju u zadnjih godinu dana, a u ožujku je upisao i svoj prvi nastup protiv Egipta te ide na Euro u Njemačku.\r\n\r\nOd dolaska na Kvarner, Labrović je nastupio u 109 utakmica te je 40 puta sačuvao mrežu netaknutom, a ove sezone odigrao je 18 ligaških utakmica bez primljenog gola, što je njegov rekord u SuperSport HNL-u. Prošle sezone to mu je uspjelo 10 puta, a pretprošle sedam, tako da je ove sezone skupio više praznih mreža nego u dvije prethodne sezone zajedno. U SHNL-u su mu ove sezone najbliže bili Ivan Lučić s 15 utakmica i Ivan Nevistić s 11 utakmica bez primljenog gola.\r\n\r\n', 'golman.jpg', 'sport', 0),
(6, '2024-06-Tue', 'Hrvatska atletska senzacija', 'Roko Farkaš (19) je nova hrvatska atletska senzacija. Sada kreće u ludu misiju.', 'IAKO je najveća hrvatska zvijezda na Europskom atletskom prvenstvu u Rimu bila Sandra Elkasević, koja je sedmi put zaredom osvojila kontinentalno zlato, proteklog je vikenda u hrvatskim medijima zabljesnulo ime Roka Farkaša. Taj 19-godišnjak iz Nedelišća, zagrebački student i član AK Slobode iz Varaždina srušio je 43 godine star državni rekord na 200 metara.\r\n\r\nFarkaš je u Rimu dionicu u kvalifikacijama istrčao za 20.70 sekundi i tako za šest stotinki srušio hrvatski rekord Željka Knapića iz 1981. godine, a za čak 19 stotinki svoj rekord. Bilo je to šesto vrijeme kvalifikacija, više nego dovoljno za plasman u polufinale. Ipak, u večernjoj utrci bio je sporiji te s vremenom 20.95 nije uspio ući u finale.\r\n\r\nNo Farkaš se sa samo 19 godina upisao u povijest hrvatske atletike i dao do znanja da je ime vrijedno pamćenja i daljnjeg praćenja, pogotovo ako se zna da 200 metara nije disciplina kojoj se posvetio. On je zapravo desetobojac kojem se jednostavno otvorila prilika da prvi put nastupi na seniorskom EP-u u jednoj od višebojnih disciplina te ju je odlučio iskoristiti, a sad čak ima šanse u njoj nastupiti na Olimpijskim igrama. Kreće u ludu misiju da ulovi vizu za Pariz.\r\n\r\nU kratkom razgovoru za Index Farkaš je ispričao kako je dospio na EP u \"pogrešnoj\" disciplini, otkrio zašto se više posvetio manje popularnom, a težem desetoboju te objasnio kako se može ubaciti na popis hrvatske delegacije u Parizu.\r\n\r\nČestitke na rekordu. Jeste li očekivali takav rezultat prije odlaska u Rim?\r\nZnao sam da sam brz, da sam dobar i da bih trebao postaviti osobni rekord, možda 20.80, pa sam se iznenadio kad sam prošao kroz cilj i vidio 20.70, nisam očekivao takav rezultat.\r\n\r\nLani sam se jako popravio i spustio se na 21.04, ove godine na 20.89 i sada 20.70. Treninzi su pokazivali da bi utrka mogla biti brza, a razveselio sam se kad sam vidio da sam u sedmoj stazi, koja mi paše jer je blaži zavoj. Sretan sam zbog rekorda, nadam se da ćemo ga još popraviti ako ne ove, onda iduće godine.\r\n\r\nPolufinale mi je bilo nagrada, ali sam se i emotivno i fizički ispraznio i to više nije bilo to. Ali ne bih ni s 20.70 ušao u finale, tamo se išlo s 20.53, trebao bih još jako spustiti rezultat.', 'atletika.jpg', 'sport', 0),
(7, '2024-06-Tue', 'Šveđani nadigrali Hrvatsku', 'Šveđani deklasirali mladu reprezentaciju Hrvatske', 'NEKOLIKO dana nakon poraza od vršnjaka iz Irske u Vrbovcu, U-21 reprezentacija Hrvatske je u Zaprešiću rezultatom 5:2 izgubila od Švedske u prijateljskoj utakmici. Gosti su poveli preko Huga Bolina u 7. minuti, ali Hrvatska je do kraja prvog dijela preokrenula preko Luke Škaričića u 32. i Matije Frigana u prvoj minuti sudačke nadoknade.\r\n\r\nU drugom poluvremenu Šveđani su bili značajno bolji i do svog preokreta došli su ekspresno. Za izjednačenje je pogodio Deniz Gul u 51. minuti, a dvije minute kasnije ponovno je zabio Bolin.\r\n\r\nDo kraja utakmice Osijekovog Franka Kolića matirali su još Aimar Sher u 74. i Jonas Rouhi u 86. minuti. Ekipa Dragana Skočića neće se sastati do rujna kada je čekaju kvalifikacije za Europsko prvenstvo.', 'dd18e032-dc61-4f50-ae45-3b22f218891d.jpg', 'sport', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unos`
--
ALTER TABLE `unos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `unos`
--
ALTER TABLE `unos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
