-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 07 Haz 2022, 19:52:48
-- Sunucu sürümü: 10.4.22-MariaDB
-- PHP Sürümü: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `blog`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `categories`
--

CREATE TABLE `categories` (
  `category_id` int(3) NOT NULL,
  `category_name` varchar(31) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(3, 'Programming'),
(9, 'Matematik'),
(10, 'Geometrie'),
(16, 'Fotoğrafcılık'),
(17, 'Design'),
(18, 'JavaScript'),
(19, 'Roman'),
(20, 'SPORT');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(3) NOT NULL,
  `comment_post_id` int(3) NOT NULL,
  `comment_date` date NOT NULL,
  `comment_author` varchar(31) COLLATE utf8_turkish_ci NOT NULL,
  `comment_email` varchar(64) COLLATE utf8_turkish_ci NOT NULL,
  `comment_text` text COLLATE utf8_turkish_ci NOT NULL,
  `comment_status` varchar(31) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_date`, `comment_author`, `comment_email`, `comment_text`, `comment_status`) VALUES
(2, 5, '2021-05-12', 'Ali Hissein', 'a.hissein@gmail.com', 'Matematik, numaralar, felsefe, uzay ve fizik gibi konularla ilgilenir. Matematikçiler ve filozoflar arasında matematiğin kesin kapsamı ve tanımı konusunda görüş ayrılığı vardır. Matematikçiler örüntüleri araştırır ve bunları yeni konjektürler formüle etmekte kullanırlar.', 'approved'),
(3, 2, '2022-05-14', 'Emre doğan', 'e.dogan@gmail.com', 'bu kitap çok güzel bilimsel ve aynıı anda hikayesel olarak.', 'approved'),
(5, 2, '2022-05-15', 'Emre doğan', 'e.dogan@gmail.com', 'bu kitap çok güzel bilimsel ve aynıı anda hikayesel olarak.', 'unapproved'),
(8, 6, '2022-05-15', 'osman musa', 'abouadil226@gmail.com', 'lisedeyken en sevdiğim ders ve kitap olarak ciam.', 'unapproved'),
(9, 6, '2022-05-15', 'beşir mohemmed', 'b.mohemmed@yahoo.fr', 'matematik alanında en iyi kitaplardan birisidir.', 'approved'),
(10, 2, '2022-05-15', 'Amir', 'amir@gmail.com', 'yorum yorum.', 'approved'),
(11, 8, '2022-05-16', 'Murat', 'murat@gmail.com', 'Bu bilgilerden çok faydalandım ve teşekkür ederim!', 'approved'),
(12, 8, '2022-05-16', 'ahmed', 'ahmed@gmail.com', 'Tabi ki de sport genel olarak çok sağlıklıdır', 'unapproved');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `portfolios`
--

CREATE TABLE `portfolios` (
  `portfolio_id` int(3) NOT NULL,
  `portfolio_name` varchar(31) COLLATE utf8_turkish_ci NOT NULL,
  `portfolio_category` varchar(31) COLLATE utf8_turkish_ci NOT NULL,
  `portfolio_img_sm` text COLLATE utf8_turkish_ci NOT NULL,
  `portfolio_img_bg` text COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `portfolios`
--

INSERT INTO `portfolios` (`portfolio_id`, `portfolio_name`, `portfolio_category`, `portfolio_img_sm`, `portfolio_img_bg`) VALUES
(1, 'Super-Cl', 'Model', '01-thumbnail.jpg\r\n', '01-full.jpg'),
(2, 'Devpp', 'Web Developper', 'about1.jpg', 'about2.jpg'),
(7, 'AutoCad', 'Design', 'sm.jpg', 'bg.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `posts`
--

CREATE TABLE `posts` (
  `post_id` int(10) NOT NULL,
  `post_category` varchar(31) COLLATE utf8_turkish_ci NOT NULL,
  `post_title` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `post_author` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `post_date` date NOT NULL,
  `post_comment_number` int(10) NOT NULL,
  `post_image` text COLLATE utf8_turkish_ci NOT NULL,
  `post_text` text COLLATE utf8_turkish_ci NOT NULL,
  `post_tags` text COLLATE utf8_turkish_ci NOT NULL,
  `post_hits` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `posts`
--

INSERT INTO `posts` (`post_id`, `post_category`, `post_title`, `post_author`, `post_date`, `post_comment_number`, `post_image`, `post_text`, `post_tags`, `post_hits`) VALUES
(2, 'Roman', 'les mains salles', 'jean paul sarte', '2013-05-13', 6, 'mains_sales.jpg', 'Les mains sales montre au monde que la politique est imparfaite.', 'politique', 4),
(5, 'Roman', 'Prisoner of tehran', 'Almayit', '2022-05-13', 8, 'prisoner of tehran.jpg', 'la politique a une autre face en iran', 'Politique', 2),
(6, 'Geometrie', 'Matematik', 'issam', '2022-05-14', 8, 'ciam.jpg', 'Ciam est un livre scientifique.', 'Science', 0),
(7, 'JavaScript', 'Text JavaScript', 'Osman', '2022-05-14', 8, 'javascript1.png', 'javascript dili ile web sayfası oluşturmak için dinamik bir dil', 'Java Dili', 3),
(8, 'SPORT', 'Futbool', 'Yılmaz KAPLAN', '2022-05-16', 8, 'sport2.jpg', 'Spor kültürü, spora ilişkin her türlü değeri, ürünü ve davranışı belirtir. Bu çalışmada, bir kültür öğesi olarak sporun, Türkiye’deki görünümünün tartışılması amaçlanmıştır. Bu çalışma, amacı açısından betimleyici, kapsadığı zaman açısından dönemsel, kullanılan teknik açısından da literatüre dayalı bir kuramsal tartışmadır. İnsanların içinde bulundukları yaşam koşullarına uyumları kültür ile ilgilidir. Bu durumu, “büyük ve yapısal olarak gelişmiş bir toplumda, küçük öğelere özgü yaşama ve davranma biçimlerinin tümü” (Erdemli, 2002) olarak da belirtebiliriz. ', 'futbol', 7);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(31) COLLATE utf8_turkish_ci NOT NULL,
  `user_password` varchar(31) COLLATE utf8_turkish_ci NOT NULL,
  `user_email` varchar(63) COLLATE utf8_turkish_ci NOT NULL,
  `user_role` varchar(31) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password`, `user_email`, `user_role`) VALUES
(1, 'root', '123', 'root@gmail.com', 'admin'),
(2, 'alhidjazi', 'ab123', 'a.amir@yahoo.fr', 'admin'),
(4, 'ali emir', 'a123', 'a.emir@gmail.com', 'subscriber'),
(5, 'Lol', '147', 'lol@gmail.com', 'subscriber');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Tablo için indeksler `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Tablo için indeksler `portfolios`
--
ALTER TABLE `portfolios`
  ADD PRIMARY KEY (`portfolio_id`);

--
-- Tablo için indeksler `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Tablo için AUTO_INCREMENT değeri `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `portfolios`
--
ALTER TABLE `portfolios`
  MODIFY `portfolio_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
