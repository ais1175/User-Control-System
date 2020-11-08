--
-- Tabellenstruktur für Tabelle `faq_lang`
--

CREATE TABLE `faq_lang` (
  `id` int(11) NOT NULL,
  `title` varchar(100) CHARACTER SET latin1 NOT NULL,
  `title_de` varchar(100) NOT NULL,
  `content` text CHARACTER SET latin1 NOT NULL,
  `content_de` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `faq_lang`
--

INSERT INTO `faq_lang` (`id`, `title`, `title_de`, `content`, `content_de`) VALUES
(1, 'FAQ', 'FAQ', 'This is a test', 'Das ist ein Test');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `faq_lang`
--
ALTER TABLE `faq_lang`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `faq_lang`
--
ALTER TABLE `faq_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

