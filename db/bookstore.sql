-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2023 at 03:30 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int(15) NOT NULL,
  `book_isbn` varchar(13) NOT NULL,
  `book_title` varchar(255) NOT NULL,
  `book_image` varchar(255) NOT NULL,
  `book_description` text NOT NULL,
  `book_author` varchar(255) NOT NULL,
  `book_price` varchar(255) NOT NULL,
  `cat_id` varchar(255) NOT NULL,
  `book_publisher` varchar(255) NOT NULL,
  `book_formal` varchar(255) NOT NULL,
  `stock` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `book_isbn`, `book_title`, `book_image`, `book_description`, `book_author`, `book_price`, `cat_id`, `book_publisher`, `book_formal`, `stock`) VALUES
(1, '9789672852654', 'Get Ready SPM 2022 English Form 4', 'Get Ready!SPM 2022.png\r\n', 'EXCEL IN SPM. LATEST FORMAT SPM\r\n\r\nThe GET READY! SPM series is specially designed for the upper secondary students to achieve excellent result in SPM. This series is prepared based on the Content Standards and Learning Standards in the DSKP KSSM, textbook and the latest SPM exam format. It is systematically arranged to equip students with extra features to excel in the examination.\r\n\r\n- Formative and Summative Assessment\r\n\r\n- Fulfills Exam requirements \r\n\r\n- Answers complete and precise', 'Zeti Aqmar Alpikir & Ummi Nadzirah Zainol', '10.00', '1', 'Pelangi', 'Paper', 0),
(2, '9789672851952', 'Get Ready SPM 2022 Bahasa Melayu Tingkatan 4', 'Get Ready SPM 2022 Tingkatan 4.jpg ', 'YAKIN MENGHADAPI SPM. FORMAT TERKINI SPM.\r\n\r\nSiri Get Ready! SPM amat sesuai digunakan oleh murid-murid tahap menengah atas ke arah pencapaian SPM yang cemerlang. Berpandukan Standard Kandungan dan Standard Pembelajaran dalam DSKP KSSM, buku teks, serta format Kertas SPM yang baharu, semua latihan ini disusun secara sistematik dan disertakan pelbagai ciri ekstra supaya muri-murid dapat merintis kecemerlangan dalam peperiksaan.\r\n\r\n- Latih Tubi Pentaksiran Formatif dan Sumatif\r\n\r\n- Memenuhi kehendak Peperiksaan\r\n\r\n- Jawapan tepat dan lengkap', 'Hasniza Mohd Salim & Alshaa Rani Ab Wahab', '10.00', '1', 'Pelangi', 'Paper', 23),
(3, '9789672844521', 'Focus Visual SPM KSSM 2023 Sejarah', 'Focus Visual SPM Sejarah.jpg', 'Siri ini bertujuan untuk menghasilkan pembelajaran berimpak dalam kalangan murid. Penerangan fakta melaui pendekatan infografik dan diagramatik dapat memberikan kesan visual yang bukan sahaja merangsang minat tetapi juga ingatan pembaca.\r\n\r\nCiri-ciri istimewa buku ini:\r\n\r\n- Uji diri\r\n\r\n- Tip SPM\r\n\r\n- Cabaran KBAT\r\n\r\n- Peta i-Think\r\n\r\n- Model 3D', 'Pauline Wong Mee Kiong', '35.00', '1', 'Pelangi', 'Paper', 45),
(4, '9789670071254', 'Focus Visual SPM KSSM 2023 Fizik', 'Focus Visual SPM Fizik.jpg', 'Siri ini bertujuan untuk menghasilkan pembelajaran berimpak dalam kalangan murid. Penerangan fakta melaui pendekatan infografik dan diagramatik dapat memberikan kesan visual yang bukan sahaja merangsang minat tetapi juga ingatan pembaca.\r\n\r\nCiri-ciri istimewa buku ini:\r\n\r\n- Uji diri\r\n\r\n- Tip SPM\r\n\r\n- Cabaran KBAT\r\n\r\n- Peta i-Think\r\n\r\n- Model 3D', 'Pauline Wong Mee Kiong', '35.00', '1', 'Pelangi', 'Paper', 0),
(5, '9786297528546', 'Module & More Matematik Tambahan Tingkatan 5', 'Module & More Matematik Tambahan.jpg', 'embelajaran BERPANDU dan SISTEMATIK. Format SPM Terkini\r\n\r\nCiri-ciri Hebat:- \r\n\r\n- Latihan setiap bab untuk ulang kaji\r\n\r\n- Latihan berorientasikan SPM (Kod QR)\r\n\r\n- Tip menjawab soalan Kertas 2\r\n\r\n- Soalan berformatkan i-THINK dan berbentuk aras tinggi.\r\n\r\n- Lembaran PBD (Kod QR)\r\n\r\n- Dwibahasa (Bahasa Melayu dan English)\r\n\r\n- Jawapan Lengkap (Kod QR)\r\n\r\n- Pelangi Online Test (POT) (Kod QR)\r\n\r\nHalaman: 194 halaman', 'Dr. Pauline Wong Mee Kiong', '13.50', '1', 'Pelangi', 'Paper', 19),
(6, '9786297524512', 'Module and More Fizik Tingkatan 5', 'Module and More Fizik Tingkatan 5.jpg', 'Pembelajaran BERPANDU dan SISTEMATIK. Format SPM Terkini\r\n\r\nCiri-ciri Hebat:- \r\n\r\n- Latihan setiap bab untuk ulang kaji\r\n\r\n- Latihan berorientasikan SPM (Kod QR)\r\n\r\n- Tip menjawab soalan Kertas 2\r\n\r\n- Soalan berformatkan i-THINK dan berbentuk aras tinggi.\r\n\r\n- Lembaran PBD (Kod QR)\r\n\r\n- Dwibahasa (Bahasa Melayu dan English)\r\n\r\n- Video sebagai maklumat tambahan (Kod QR)\r\n\r\n- Jawapan Lengkap (Kod QR)\r\n\r\n- Pelangi Online Test (POT) (Kod QR)\r\n\r\nHalaman: 218 halaman', 'Yeoh Ti Pheng', '13.50', '1', 'Pelangi', 'Paper', 60),
(7, '9786297521458', 'Highlights Model Essays SPM 2023', 'Highlights Model Essays.jpg', 'Highlights Model Essays SPM Form 4, Form 5\r\n\r\nNew SPM Assessment Format\r\n\r\nCEFR-Aligned\r\n\r\nThis book is designed to help students improve their writing skills. From the interpretation of the question to the planning and writing process, the reader is guided step by step in two part calls Short Communicative Message, Guide Writing and Extended Writing. Each Model Essay illustrates the process of developing ideas into a essay by putting into practice simple yet invaluable principles of essay writing. Though aimed at SPM Form 4 and Form 5 students, this book is also suitable for anyone who wants write well.\r\n\r\n- Cover three (3) parts of the SPM Writing paper\r\n\r\n- Step-by-step guide for different essay types\r\n\r\n- Word Bank and Idioms for Vocab Enrichment\r\n\r\n- Tips and Techniques for each section\r\n\r\n- Wide Scope of Model Essays\r\n\r\n- Pages : 307 pp', 'Christine Tan, Zeti Aqmar Alpikir, Ch\'ng Teik Peng & Yong Fui Yin', '20.00', '1', 'Pelangi', 'Paper', 24),
(8, '9789672448956', 'Praktis Hebat PT3 2020 Matematik Tingkatan 3', 'Praktis Hebat PT3 Matematik.jpg', 'Praktis Asas Kecemerlangan! Berdasarkan Format Pentaksiran Tingkatan 3 (PT3).\r\n\r\nSiri Praktis Hebat! PT3 KSSM merupakan siri latihan intensif mengikut topik. Siri ini direka demi melahirkan murid untuk menaakul soalan berdarkan format pentaksiran pusat PT3. Instrumen tambahan seperti soalan KBAT dapat menjanakan prestasi murid ke arah kecemerlangan.\r\n\r\n- Praktis Intensif mengikut topik.\r\n\r\n- Soalan Berorientasikan PT3.\r\n\r\n- Praktis KBAT\r\n\r\n- Jawapan Lengkap\r\n\r\nHalaman: 87 halaman', 'K. W. Chiang, Samantha Neo & Zoway', '6.65', '1', 'Pelangi', 'Paper', 19),
(9, '9781789091690', 'The Forest of Stars', 'The Forest of Stars.jpg', 'Left all alone after her mother passes away, twelve-year-old Louisa watches the sky for her father. Long ago, a powerful gust of wind stole him away on the wings of his untamed magic-the same magic that stirs within Louisa. As if she is made of hollow bones and too much air, her feet never quite touch the ground.\r\n\r\nBut for all her sky gazing, Louisa finds her fortune on the ground when she spots a ticket to the Carnival Beneath the Stars. If her father fits in nowhere else, maybe she\'ll find him dazzling crowds alongside the other strange feats. Yet after she arrives, a tightrope act ends disastrously-and suspiciously. As fate tugs Louisa closer to the stars, she must decide if she\'s willing to slip into the injured performer\'s role, despite the darkness plucking at the carnival\'s magical threads.', 'Kassner, Heather', '54.90', '2', 'Titan Books', 'Paper', 9),
(10, '9780356511212', 'The Wheel of Time #13: Towers of Midnight (UK)', 'Towers of Midnight.jpg', 'Soon to be a major Amazon Prime TV series\r\n\r\nThe thirteenth novel in the Wheel of Time series - one of the most influential and popular fantasy epics ever published.\r\n\r\nThe Last Battle has started. The seals on the Dark One\'s prison are crumbling. The Pattern itself is unravelling, and the armies of the Shadow have begun to spill out of the Blight.\r\n\r\nPerrin Aybara is haunted by spectres from his past. To prevail, he must find a way to master the wolf within him or lose himself to it for ever.\r\n\r\nMeanwhile, Matrim Cauthon prepares for the most difficult challenge of his life. The Tower of Ghenjei awaits, and its secrets will reveal the fate of a friend long lost.\r\n\r\nThe end draws near. It\'s time to roll the dice.', 'Jordan, Robert; Sanderson, Brandon', '65.90', '2', 'Orbit', 'Paper', 11),
(11, '9780356511563', 'The Wheel of Time Prequel: New Spring (UK)', 'New Spring.jpg', 'The prequel novel to the globally bestselling Wheel of Time series - a fantasy phenomenon\r\n\r\nThe city of Canluum lies close to the scarred and desolate wastes of the Blight, a walled haven from the dangers away to the north, and a refuge from the ill works of those who serve the Dark One. Or so it is said. The city that greets Al\'Lan Mandragoran, exiled king of Malkier and the finest swordsman of his generation, is instead one that is rife with rumour and the whisperings of Shadowspawn. Proof, should he have required it, that the Dark One grows powerful once more and that his minions are at work throughout the lands.\r\n\r\nAnd yet it is within Canluum\'s walls that Lan will meet a woman who will shape his destiny. Moiraine is a young and powerful Aes Sedai who has journeyed to the city in search of a bondsman. She requires aid in a desperate quest to prove the truth of a vague and largely discredited prophecy - one that speaks of a means to turn back the shadow, and of a child who may be the dragon reborn.', 'Jordan, Robert', '65.90', '2', 'Orbit', 'Paper\r\n', 14),
(12, '9780393354512', 'Norse Mythology', 'Norse Mythology.jpg', 'In Norse Mythology, Gaiman stays true to the myths in envisioning the major Norse pantheon: Odin, the highest of the high, wise, daring, and cunning; Thor, Odin\'s son, incredibly strong yet not the wisest of gods; and Loki-son of a giant-blood brother to Odin and a trickster and unsurpassable manipulator.', 'Gaiman, Neil', '59.90', '2', 'Abacus', 'Paper', 0),
(13, '9789815085001', 'Freedom Embraced', 'Freedom Embraced.jpg', 'As professionals, the workplace is where we spend most of our waking moments. It is where we can actualise our potential, flourish and be happy. Yet, it is also where we are bombarded by stressors such as unrealistic deadlines, office politics, disengagement, ineffective managers and toxic culture. These leave us feeling helpless and trapped - with a sense of freedom lost.\r\n\r\nIn Freedom Embraced, author Bernadette Chua, has written a book specially for the busy professional in mind. It is filled with actionable strategies and mindset shifts to navigate through the various mental, emotional and physical landscapes we encounter in the course of work.', 'Farooki, Roopa\r\n', '79.90', '3', 'Marshall Cavendish International (Asia) Pte Ltd', 'Paper', 29),
(14, '9781526631001', 'Everything Is True: A Junior Doctor\'s Story of Life, Death and Grief', 'Everything Is True.jpg\r\n', 'In early 2020, junior doctor Roopa Farooki lost her sister to cancer. But just weeks later, she found herself plunged into another kind of crisis, fighting on the frontline of the battle taking place in her hospital, and in hospitals across the country.\r\n\r\nEverything is True is the story of Roopa\'s first forty days of the Covid-19 crisis from the frontlines of A&E and the acute medical wards, as struggling through her grief, she battles for her patients\' and colleagues\' survival. Working thirteen-hour shifts, she returns home each evening to write through her exhaustion, chronicling the devastating losses and slowly eroding dehumanisation happening in real time on the ward.', 'Farooki, Roopa', '66.90', '3', 'Bloomsbury UK', 'Paper', 16),
(15, '9789672997696', 'Notes & Practices MUET Malaysian University English Test', 'Notes & Practices MUET.jpg', 'Exclusive features:\r\n- Express Notes\r\n- Examination Guidelines\r\n- MUET-format Practices\r\n- 1 set of MUET Model Test\r\n- Answers', '-', '17.90', '1', 'Ilmu Bakti', 'Paper', 29),
(16, '9789674939366', 'MUET Model Tests', 'MUET Model Tests.jpg', 'Latest Exam Specifications 2021\r\n-CEFR Aligned\r\n-5 Sets Of MUET Model Tests\r\n-Listening Script For Paper 1 (800/1)\r\n-Suggested Answers', '-', '12.90', '1', 'Ilmu Bakti', 'Paper', 15),
(17, ' 978178909559', 'The Invisible Life of Addie LaRue', 'The Invisible Life of Addie LaRue.jpg', 'A Sunday Times-bestselling, award-nominated genre-defying tour-de-force of Faustian bargains, for fans of The Time Traveler\'s Wife and Life After Life, and The Sudden Appearance of Hope.\r\n\r\nWhen Addie La Rue makes a pact with the devil, she trades her soul for immortality. But there\'s always a price - the devil takes away her place in the world, cursing her to be forgotten by everyone.\r\n\r\nAddie flees her tiny home town in 18th-Century France, beginning a journey that takes her across the world, learning to live a life where no one remembers her and everything she owns is lost and broken. Existing only as a muse for artists throughout history, she learns to fall in love anew every single day.\r\n\r\nHer only companion on this journey is her dark devil with hypnotic green eyes, who visits her each year on the anniversary of their deal. Alone in the world, Addie has no choice but to confront him, to understand him, maybe to beat him.\r\n\r\nUntil one day, in a second hand bookshop in Manhattan, Addie meets someone who remembers her. Suddenly thrust back into a real, normal life, Addie realises she can\'t escape her fate forever.', 'Schwab, V. E.', '79.90', '2', 'Titan Books Ltd', 'Paper', 25),
(18, '9780063237483', 'Daughter of the Moon Goddess (US)', 'Daughter of the Moon Goddess.jpg', 'A young woman\'s quest to free her mother pits her against the most powerful immortal in the realm, setting her on a dangerous path where those she loves are not the only ones at risk...\r\n\r\nGrowing up on the moon, Xingyin is accustomed to solitude, unaware that she is being hidden from the powerful Celestial Emperor who exiled her mother for stealing his elixir of immortality. But when her magic flares and her existence is discovered, Xingyin is forced to flee her home, leaving her mother behind.\r\n\r\nAlone, powerless, and afraid, she makes her way to the Celestial Kingdom, a land of wonder and secrets. Disguising her identity, she seizes an opportunity to train in the Crown Prince\'s service, learning to master archery and magic, despite the passion which flames between her and the emperor\'s son.\r\n\r\nTo save her mother, Xingyin embarks on a perilous quest, confronting legendary creatures and vicious enemies, across the earth and skies.\r\n\r\nBut when treachery looms and forbidden magic threatens the kingdom, she must challenge the ruthless Celestial Emperor for her dream -striking a dangerous bargain, where she is torn between losing all she loves or plunging the realm into chaos.', 'Tan Sue Lynn\r\n', '84.95', '2', ' Harper Voyager', 'Paper', 25),
(19, '9781526622884', 'Crescent City #1: House of Earth and Blood', 'Crescent City.jpg', '', 'Maas, Sarah J.', '', '2', 'Bloomsbury UK', 'paper', 20),
(20, '9780316495967', 'The Last Wish (The Witcher, Media Tie-In)', 'The Last Wish.jpg', 'Now a Netflix original series!\r\n\r\nGeralt the Witcher -- revered and hated -- holds the line against the monsters plaguing humanity in this collection of adventures, the first chapter in the New York Times bestselling series that inspired the hit Netflix show and the blockbuster video games.\r\n\r\nGeralt is a Witcher, a man whose magic powers, enhanced by long training and a mysterious elixir, have made him a brilliant fighter and a merciless assassin. Yet he is no ordinary killer. His sole purpose: to destroy the monsters that plague the world.\r\n\r\nBut not everything monstrous-looking is evil and not everything fair is good...and in every fairy tale there is a grain of truth.', 'Sapkowski, Andrzej', '49.90', '2', 'Orbit', 'Paper', 20),
(21, '9780552177436', 'The Sentinel (UK)', 'The Sentinel.jpg', 'The edge-of-your-seat, heart-in-mouth new Jack Reacher thriller for 2021 - his 25th adventure. No one\'s bigger than Jack Reacher.\r\n\r\nJack Reacher gets off the bus in a sleepy no-name town outside Nashville, Tennessee. He plans to grab a cup of coffee and move right along.\r\n\r\nNot going to happen.\r\n\r\nThe town has been shut down by a cyber attack. At the centre of it all, whether\r\nhe likes it or not, is Rusty Rutherford. He\'s an average IT guy, but he knows more than he thinks.\r\n\r\nAs the bad guys move in on Rusty, Reacher moves in on them . . .\r\n\r\nAnd now Rusty knows he\'s protected, he\'s never going to leave the big man\'s side.\r\n\r\nReacher might just have to stick around and find out what the hell\'s gone wrong . . . and then put it right, like only he can.', 'Child, Lee', '42.50', '2', 'Penguin UK', 'Paper', 15),
(22, '9781529398281', 'Searching for Sylvie Lee', 'Searching for Sylvie Lee.jpg', 'It begins with a mystery. Sylvie, the beautiful, brilliant, successful older daughter of the Lee family, flies to the Netherlands for one final visit with her dying grandmother - and then vanishes.\r\n\r\nAmy, the sheltered baby of the Lee family, is too young to remember a time when her parents were newly immigrated and too poor to keep Sylvie. Seven years older, Sylvie was raised by a distant relative in a faraway, foreign place, and didn\'t rejoin her family in America until age nine. Timid and shy, Amy has always looked up to her sister, the fierce and fearless protector who showered her with unconditional love.\r\n\r\nBut what happened to Sylvie? Amy and her parents are distraught and desperate for answers. Sylvie has always looked out for them. Now, it\'s Amy\'s turn to help. Terrified yet determined, Amy retraces her sister\'s movements, flying to the last place Sylvie was seen. But instead of simple answers, she discovers something much more valuable: the truth. Sylvie, the golden girl, kept painful secrets . . . secrets that will reveal more about Amy\'s complicated family - and herself - than she ever could have imagined.\r\n\r\nA deeply moving story of family, secrets, identity, and longing, Searching for Sylvie Lee is both a gripping page-turner and a sensitive portrait of an immigrant family. It is a profound exploration of the many ways culture and language can divide us and the impossibility of ever truly knowing someone - especially those we love.', 'Kwok, Jean', '49.90', '2', 'John Murray', 'paper', 38),
(23, '9781405947329', 'Tom Clancy’s Firing Point (UK)', 'Tom Clancy Firing Point.jpg', 'Jack Ryan - out to avenge the murder of an old friend - finds himself in deep trouble fast . . .\r\n\r\nDuring a well-earned break, Jack Ryan Jr runs into old flame Renee Moore in a scenic Barcelona cafe.\r\n\r\nBut Renee is not so pleased to see him. Distracted, she says she\'s waiting for someone and can\'t talk. She promises to call him later, and sends him out onto the street.\r\n\r\nWhich is when the bomb goes off.\r\n\r\nThere\'s nothing he can do to save Renee. But as he cradles her, she utters one last word with her final breath: \'Sammler\'\r\n\r\nWho did she mean? What did she know? And what trouble had Renee got herself into?\r\n\r\nWhen every thread Jack pulls threatens to make the situation ever more dangerous, he realises he\'s stumbled into an international conspiracy that might be more than even he can handle.\r\n\r\nBecause Renee isn\'t the first to die. And she won\'t be the last . . .', 'Maden, Mike', '42.50', '2', 'Penguin UK', 'Paper', 25),
(24, '9789672459132', 'Will You Stay?', 'Will You Stay.jpg', '“If you love Allah and take care of your relationship with Him, He will take care of the people whom you love.\"\r\n\r\nAmy is a 30-year-old doctor who strives to live a meaningful life, choosing to focus on enjoying the company of her friends and committed in nurturing her faith. The unexpected presence of someone from her friend’s past stirs up feelings within her. What she was afraid to dream of before this, presented itself to her like a ray of hope from God.\r\n\r\nJust as her newfound happiness begin to colour her life, her faith is put to the test. Will love stay or will it leave? Will she surrender herself to the One whose love is eternal? In this book, award-winning author Norhafsah Hamid takes reader on a heart-warming journey of understanding what it means to love compassionately and with mercy. For that is the kind of love that will lead us back to God.', 'Norhafsah Hamid', '30.00', '2', 'Iman Publication', 'Paper', 50),
(25, ' 978153870387', 'A Dog\'s Hope', 'A Dog\'s Hope.jpg', 'Discover this poignant, heart-wrenching, and ultimately uplifting novel about the unbreakable bond between a boy and his dog that\'s perfect for fans of A Dog\'s Purpose, The Art of Racing, and Marley and Me.In the farming town of Riverside in Washington, Toby Fuller is feeling more alone than ever. Nothing Toby did was ever good enough for his father, but he never expected his father to leave, to abandon him and his mother forever. He loses hope, until a scruffy golden retriever called Buddy follows him home from school. Though he\'s struggling to walk, Buddy matches Toby step for step, never taking his eyes off him, as if Toby is all he needs in the world. And from that day on Buddy never leaves Toby\'s side. Buddy shows Toby a loyalty that he has never known. But then disaster strikes and Toby\'s life is changed forever. Will Buddy be able to give Toby the strength he needs to carry on?', 'Wilson, Casey', '49.90', '2', 'Grand Central Publishing', 'Paper', 15),
(26, '9789670729138', 'Heaven Sent', 'Heaven Sent.jpg', 'Sarah is a Muslim girl faced with challenges and obstacles to remain true to her religion. Whilst she endures hardship, she also found friendship and love.\r\n\r\nJonah is the \'modern day\' Rome and enjoys the company of women but when he met Sarah, his whole world changed.\r\n\r\nBoth are from different background and religion but yet their path kept crossing. Is it fate or just coincidence?', 'Norhafsah Hamid', '33.00', '2', 'Iman Publication', 'Paper', 15),
(27, '9780241420430', 'Protector', 'Protector.jpg', 'Themistocles stands as the battle-scarred leader of Athens. Yet he is no nobleman and is distrusted by many.\r\n\r\nBut those who stand against him cannot argue with two things: his victories as a warrior, and the vast Persian army heading their way . . .\r\n\r\nAnd so Themistocles must fight.\r\n\r\nFight the invaders. Fight the allies who despise him. Fight for his city.\r\n\r\nAs the Persians draw close, he must prove himself again and again in battle.\r\n\r\nBecause history belongs to the courageous . . .\r\n\r\nSet in the bloody, brutal world of Ancient Persia, an age of ever-shifting loyalties and epic battles. Witness the rise and fall of the world\'s greatest empire.', 'Iggulden, Conn', '56.95', '2', 'Michael Joseph', 'Paper', 15),
(28, '9780593189641', 'Atomic Habits: An Easy & Proven Way to Build Good Habits & Break Bad Ones', 'Atomic Habits.jpg', 'No matter your goals, Atomic Habits offers a proven framework for improving--every day. James Clear, one of the world\'s leading experts on habit formation, reveals practical strategies that will teach you exactly how to form good habits, break bad ones, and master the tiny behaviors that lead to remarkable results.\r\n\r\nIf you\'re having trouble changing your habits, the problem isn\'t you. The problem is your system. Bad habits repeat themselves again and again not because you don\'t want to change, but because you have the wrong system for change. You do not rise to the level of your goals. You fall to the level of your systems. Here, you\'ll get a proven system that can take you to new heights.\r\n\r\nClear is known for his ability to distill complex topics into simple behaviors that can be easily applied to daily life and work. Here, he draws on the most proven ideas from biology, psychology, and neuroscience to create an easy-to-understand guide for making good habits inevitable and bad habits impossible. Along the way, readers will be inspired and entertained with true stories from Olympic gold medalists, award-winning artists, business leaders, life-saving physicians, and star comedians who have used the science of small habits to master their craft and vault to the top of their field.', 'Clear, James', '79.90', '3', ' Avery', 'paper', 15),
(29, '9780141033570', 'Thinking, Fast and Slow (UK)', 'Thinking, Fast and Slow.jpg', 'Why is there more chance we\'ll believe something if it\'s in a bold type face? Why are judges more likely to deny parole before lunch? Why do we assume a good-looking person will be more competent? The answer lies in the two ways we make choices: fast, intuitive thinking, and slow, rational thinking. This book reveals how our minds are tripped up by error and prejudice (even when we think we are being logical), and gives you practical techniques for slower, smarter thinking. It will enable to you make better decisions at work, at home, and in everything you do.', 'Kahneman, Daniel', '49.95', '3', 'Penguin UK', 'paper', 15),
(30, '9781591846352', 'The Obstacle Is the Way: The Timeless Art of Turning Trials into Triumph', 'The Obstacle Is the Way.jpg', 'We are stuck, stymied, frustrated. But it needn\'t be this way. There is a formula for success that\'s been followed by the icons of history-from John D. Rockefeller to Amelia Earhart to Ulysses S. Grant to Steve Jobs-a formula that let them turn obstacles into opportunities. Faced with impossible situations, they found the astounding triumphs we all seek.\r\n\r\nThese men and women were not exceptionally brilliant, lucky, or gifted. Their success came from timeless philosophical principles laid down by a Roman emperor who struggled to articulate a method for excellence in any and all situations.\r\n\r\nThis book reveals that formula for the first time-and shows us how we can turn our own adversity into advantage.', 'Holiday, Ryan', '52.95', '3', 'Portfolio', 'Hardcover', 20),
(31, '9781591847816', 'Ego is the Enemy', 'Ego is the Enemy.jpg', 'While the history books are filled with tales of obsessive visionary geniuses who remade the world in their image with sheer, almost irrational force, I ve found that history is also made by individuals who fought their egos at every turn, who eschewed the spotlight, and who put their higher goals above their desire for recognition. from the prologue Many of us insist the main impediment to a full, successful life is the outside world. In fact, the most common enemy lies within: our ego. Early in our careers, it impedes learning and the cultivation of talent. With success, it can blind us to our faults and sow future problems. In failure, it magnifies each blow and makes recovery more difficult. At every stage, ego holds us back. \"Ego Is the Enemy \"draws on a vast array of stories and examples, from literature to philosophy to history. We meet fascinating figures such as George Marshall, Jackie Robinson, Katharine Graham, Bill Belichick, and Eleanor Roosevelt, who all reached the highest levels of power and success by conquering their own egos. Their strategies and tactics can be ours as well. In an era that glorifies social media, reality TV, and other forms of shameless self-promotion, the battle against ego must be fought on many fronts. Armed with the lessons in this book, as Holiday writes, you will be less invested in the story you tell about your own specialness, and as a result, you will be liberated to accomplish the world-changing work you ve set out to achieve. \"', 'Holiday, Ryan', '63.50', '3', ' Portfolio US', 'Hardcover', 50),
(32, '9780141979243', 'The Master Algorithm: How the Quest for the Ultimate Learning Machine Will Remake Our World', 'The Master Algorithm.jpg', 'Society is changing, one learning algorithm at a time, from search engines to online dating, personalized medicine to predicting the stock market. But learning algorithms are not just about Big Data - these algorithms take raw data and make it useful by creating more algorithms. This is something new under the sun: a technology that builds itself. In The Master Algorithm, Pedro Domingos reveals how machine learning is remaking business, politics, science and war. And he takes us on an awe-inspiring quest to find \'The Master Algorithm\' - a universal learner capable of deriving all knowledge from data.', 'Domingos,Pedro', '59.95', '3', 'Penguin Uk', 'paper', 5),
(33, ' 978055384007', 'Emotional Intelligence : Why It Can Matter More Than IQ', 'Emotional Intelligence.jpg', 'Drawing on groundbreaking brain and behavioral research, Goleman shows the factors at work when people of high IQ flounder and those of modest IQ do surprisingly well. These factors, which include self - awareness, self - discipline, and empathy, add up to a different way of childhood is a critical time for its development, emotional intelligence is not fixed at birth. It can be nurtured and strengthened throughout adulthood - with immediate benefits to our health, our relationship, and our work.', 'Goleman, Daniel\r\n', '42.50', '3', 'Bantam Books (US)', 'paper', 15),
(34, '9780143132295', 'Yourself in a World Striving for Perfection (US)', 'Yourself in a World Striving for Perfection.jpg', 'From the author of the phenomenal multi-million copy bestseller The Things You Can See Only When You Slow Down\r\n\r\n\"Hearing the words \'be good to yourself first, then to others\' was like being struck by lightning.\"\r\n\r\nMany of us respond to the pressures of life by turning inwards and ignoring problems, sometimes resulting in anxiety or depression. Others react by working harder at work, at school or at home, hoping that this will make ourselves and the people we love happier.\r\n\r\nBut what if being yourself is enough? Just as we are advised on airplanes to take our own oxygen first before helping others, we must first be at peace with ourselves before we can be at peace with the world around us.\r\n\r\nIn this beautiful follow-up to his international bestseller The Things You Can See Only When You Slow Down, Buddhist monk Haemin Sunim turns his trademark wisdom and kindness to self-care, arguing that only by accepting yourself - and the flaws which make you who you are - can you have compassionate and fulfilling relationships with your partner, family and friends.', 'Sunim, Haemin', '52.50', '3', 'Penguin US', 'Paper', 10);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `bid` int(11) NOT NULL,
  `qty` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `uid`, `bid`, `qty`) VALUES
(20, 19, 14, '3'),
(21, 20, 1, '2'),
(23, 19, 1, '1'),
(29, 30, 1, '1'),
(31, 23, 5, '1'),
(32, 1, 3, '1'),
(33, 31, 1, '1'),
(37, 1, 1, '5'),
(40, 32, 2, '1');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(255) NOT NULL,
  `cat_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_title`, `cat_image`) VALUES
(1, 'Revision ', 'cat 1.jpg'),
(2, 'Fiction ', 'cat 2.jpeg'),
(3, 'Non-Fiction', 'cat 3.png');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `full_name` varchar(128) NOT NULL,
  `subject` varchar(400) NOT NULL,
  `msg` varchar(4000) NOT NULL,
  `email` varchar(255) NOT NULL,
  `order_num` text NOT NULL,
  `time` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `reply_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `uid`, `full_name`, `subject`, `msg`, `email`, `order_num`, `time`, `reply_status`) VALUES
(66, 23, 'cc', 'ssdfasda', 'sdasdasdasdsaasfrgraushoojsaknksknsncasncosankcnsc iqejoqehififbiabkscjcpidvioakndskfijwefnwkbviwefweffewfsfsd', 'wsiongyee@gmail.com', '95', '2023-05-29 04:30:04', 1),
(67, 23, 'Siong Yee Wong', 'sadsd', 'asdasd', 'wsiongyee@gmail.com', '', '2023-05-31 06:10:42', 1),
(68, 1, 'testing', '123', 'testing\r\n', 'recebop.rajenav@gotgel.org', '', '2023-05-29 03:29:06', 0),
(69, 1, 'siongyee', 'testing2', 'this is a testing', 'recebop.rajenav@gotgel.org', '', '2023-05-29 03:29:06', 0),
(70, 1, 'siongyee', 'testing3', 'testing again', 'recebop.rajenav@gotgel.org', '', '2023-05-29 03:29:06', 0),
(72, 0, 'try2', 'testing4', 'this is a testing only\r\n', 'test1@gmail.com', '', '2023-05-29 04:21:08', 0),
(73, 33, 'try1', 'asdas', 'test', 'wsiongyee@gmail.com', '', '2023-05-31 06:11:46', 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `uid` int(255) NOT NULL,
  `bid` int(255) NOT NULL,
  `qty` int(255) NOT NULL,
  `paid` varchar(255) NOT NULL,
  `shipping_detail_id` int(255) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` varchar(255) NOT NULL,
  `order_note` varchar(4000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `uid`, `bid`, `qty`, `paid`, `shipping_detail_id`, `payment_method`, `order_date`, `order_status`, `order_note`) VALUES
(93, 1, 1, 2, '20', 90, 'American Express', '2023-05-29 18:21:42', 'In Progress', 'this is testing'),
(99, 31, 5, 3, '40', 0, 'Master Card', '2023-05-25 15:49:01', 'Completed', ''),
(100, 31, 13, 1, '10', 0, 'American Express', '2023-05-25 15:53:26', 'Completed', ''),
(101, 31, 12, 1, '20', 91, 'Visa Card', '2023-05-25 15:58:33', 'Cancelled', ''),
(102, 21, 14, 10, '100', 92, 'Master Card', '2023-05-25 16:01:57', 'Pending', '');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `review_name` varchar(255) NOT NULL,
  `review_email` varchar(255) NOT NULL,
  `review_rating` varchar(255) NOT NULL,
  `review_title` varchar(255) NOT NULL,
  `review_body` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `user_id`, `book_id`, `review_name`, `review_email`, `review_rating`, `review_title`, `review_body`, `date`) VALUES
(22, 31, 14, 'tan', 'tan@gmail.com', '5', 'Good!!!', 'love it!!!', '2023-05-26 10:47:16'),
(23, 31, 4, 'tan', 'tan@gmail.com', '5', 'Good !!!', 'thank you!!', '2023-05-26 10:47:16'),
(24, 31, 1, 'tan', 'tan@gmail.com', '3', 'Good!!!', 'love it!!!', '2023-05-26 10:47:16'),
(25, 33, 1, 'yy', 'yy@gmail.com', '4', 'qqwa', 'sasd', '2023-05-28 01:51:18');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_detail`
--

CREATE TABLE `shipping_detail` (
  `id` int(255) NOT NULL,
  `oid` int(25) NOT NULL,
  `name` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `postcode` int(20) NOT NULL,
  `country` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shipping_detail`
--

INSERT INTO `shipping_detail` (`id`, `oid`, `name`, `telephone`, `address`, `city`, `state`, `postcode`, `country`) VALUES
(83, 93, 'wsy', '12345678', '7 G/F Jalan PJS 10/24 Taman Sri Subang', 'Petaling Jaya', 'Pahang', 41200, 'Malaysia'),
(89, 99, 'wanto', '01121213', '10, jalan nusa bestari 2 14/2', 'Johor bahru', 'Selangor', 69999, 'Malaysia'),
(90, 100, 'tesy', '01121213', '10, jalan nusa bestari 2 14/2', 'Johor bahru', 'Johor', 41200, 'Malaysia'),
(91, 101, 'tesy', '12345678', '7, jalan bakti, taman bakti', 'Johor bahru', 'Johor', 41200, 'Malaysia'),
(92, 102, 'wanto', '12345678', '11, Jln Pjs 11/1, Taman Bandar Sunway Petaling Jaya', 'Petaling Jaya', 'Selangor', 46150, 'Malaysia');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `verify_token` varchar(255) NOT NULL,
  `verify_status` int(11) NOT NULL,
  `ship_address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `states` varchar(255) NOT NULL,
  `postal` varchar(128) NOT NULL,
  `country` varchar(255) NOT NULL,
  `otpcode` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password_hash`, `verify_token`, `verify_status`, `ship_address`, `city`, `states`, `postal`, `country`, `otpcode`) VALUES
(1, 'wsy', 'test1@gmail.com', '$2y$10$1EEHn3sHPr1qkuMuCF5.zOH/cdUKhWZOSYNSKy2Uzyh.q3tbNv2Gi', '', 0, 'Multimedia University, Persiaran Multimedia', 'Cyberjaya', 'Selangor', '63100', 'Malaysia', ''),
(21, 'wanto', '123@gmail.com', '$2y$10$6aGQkf4bNBvXlNw0SCmnTeqGvN3OP5v882xBzRldFSnQF7gcZQG3.', '', 0, '10, jalan nusa bestari 2 14/2', 'Johor bahru', 'Johor', '80050', 'Malaysia', ''),
(31, 'tw', 'wsiongyee@gmail.com', '$2y$10$05AoUlCMLx1.GyE0j5Z8Bu6GGfhIbwZQXqKOfmNAAVKeXUq7aXOYi', '2b92551d3c4fd7e675a5311c5a71e302', 1, '7 G/F Jalan PJS 10/24 Taman Sri Subang', 'Petaling Jaya', 'Selangor', '46000', 'Malaysia', '81074'),
(33, 'test2', 'kucuno@tutuapp.bid', '$2y$10$cDFamyvZoWTTUn0wnm1r3ue1wsSk2ngRmaFtTc90mbF4ezSaAs2yy', '', 0, '', '', '', '', '', '92492');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `timestamp` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `uid`, `pid`, `timestamp`) VALUES
(9, 1, 3, '2023-04-07'),
(11, 19, 3, '2023-04-09'),
(12, 0, 1, '2023-04-11'),
(13, 20, 1, '2023-04-15'),
(14, 19, 1, '2023-04-23'),
(15, 30, 1, '2023-04-28'),
(17, 23, 6, '2023-05-09'),
(18, 23, 5, '2023-05-09'),
(19, 1, 6, '2023-05-26'),
(22, 32, 1, '2023-05-30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_detail`
--
ALTER TABLE `shipping_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `shipping_detail`
--
ALTER TABLE `shipping_detail`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
