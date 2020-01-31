--
-- Tabellenstruktur für Tabelle `rules_lang`
--

CREATE TABLE `rules_lang` (
  `id` int(11) NOT NULL,
  `title` varchar(100) CHARACTER SET latin1 NOT NULL,
  `title_de` varchar(100) NOT NULL,
  `content` text CHARACTER SET latin1 NOT NULL,
  `content_de` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `rules_lang`
--

INSERT INTO `rules_lang` (`id`, `title`, `title_de`, `content`, `content_de`) VALUES
(1, 'Rules', 'Regelwerk', 'Englisch \r\n\r\nYour Rules change here...             ', 'Deutsch\r\n\r\nDein Regelwerk hier bearbeiten...                ');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `rules_lang`
--
ALTER TABLE `rules_lang`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `rules_lang`
--
ALTER TABLE `rules_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;
