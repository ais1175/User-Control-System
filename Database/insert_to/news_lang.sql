--
-- Tabellenstruktur für Tabelle `news_lang`
--

CREATE TABLE `news_lang` (
  `id` int(11) NOT NULL,
  `title` varchar(100) CHARACTER SET latin1 NOT NULL,
  `title_de` varchar(100) NOT NULL,
  `content` text CHARACTER SET latin1 NOT NULL,
  `content_de` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `news_lang`
--

INSERT INTO `news_lang` (`id`, `title`, `title_de`, `content`, `content_de`) VALUES
(1, 'Open Source Project', 'Open Source Project', 'This UCP is open source and may be changed!', 'Dieses UCP ist Open Source und darf gerne verändert werden!');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `news_lang`
--
ALTER TABLE `news_lang`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für Tabelle `news_lang`
--
ALTER TABLE `news_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;
