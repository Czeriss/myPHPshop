-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Wrz 23, 2023 at 01:48 PM
-- Wersja serwera: 10.4.28-MariaDB
-- Wersja PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `books`
--

CREATE TABLE `books` (
  `ID` int(11) NOT NULL,
  `Name` varchar(200) DEFAULT NULL,
  `Category` int(11) DEFAULT NULL,
  `Author` varchar(200) DEFAULT NULL,
  `Price` int(11) DEFAULT NULL,
  `Number` int(11) DEFAULT NULL,
  `Img_Name` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`ID`, `Name`, `Category`, `Author`, `Price`, `Number`, `Img_Name`) VALUES
(1, 'Games of Thrones', 1, 'G. R. R. Martin', 15, 19, 'games_of_thrones.jpg'),
(2, 'The Witcher, The Last Wish', 1, 'A. Sapkowski', 10, 6, 'the_last_wish.jpg'),
(3, 'Lord of the Rings Trilogy', 1, 'J. R. R. Tolkien ', 30, 99, 'the_lord_of_the_rings_trilogy.jpg'),
(4, 'Harry Poter Series', 1, 'J. K. Rowling ', 100, 22, 'harry_potter_series.jpg'),
(5, 'Dnue', 2, 'F. Herbert', 10, 0, 'dune.jpg'),
(6, 'Fundacion', 2, 'I. Asimov', 7, 2, 'fundacion.jpg'),
(7, 'IT', 3, 'S. King ', 7, 10, 'it.jpg'),
(8, 'The Eyes of the Dragon', 1, 'S. King', 3, 1, 'the_eyes_of_the_dragon.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `categoty`
--

CREATE TABLE `categoty` (
  `ID` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categoty`
--

INSERT INTO `categoty` (`ID`, `Name`) VALUES
(1, 'Fantasy'),
(2, 'Science Fiction'),
(3, 'Horror');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `orders`
--

CREATE TABLE `orders` (
  `ID` int(11) NOT NULL,
  `Ordered_ID` varchar(50) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `Surname` varchar(50) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `City` varchar(50) NOT NULL,
  `Price` double NOT NULL,
  `Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`ID`, `Ordered_ID`, `FirstName`, `Surname`, `Address`, `City`, `Price`, `Date`) VALUES
(2, '1, 3', 'Bartosz', 'Pietkiewciz', '11-200 Bartoszyce, Polska', 'Bartoszyce', 45, '2023-09-23 13:43:35');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `categoty`
--
ALTER TABLE `categoty`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `categoty`
--
ALTER TABLE `categoty`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
