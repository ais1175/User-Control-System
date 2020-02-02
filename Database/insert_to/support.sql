--
-- Tabellenstruktur für Tabelle `support`
--

CREATE TABLE `support` (
  `id` int(11) NOT NULL,
  `username` varchar(16) NOT NULL,
  `msg` varchar(256) NOT NULL,
  `bug` varchar(30) NOT NULL,
  `posted` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `support`
--

INSERT INTO `support` (`id`, `username`, `msg`, `bug`, `posted`) VALUES
(1, 'DerStr1k3r', 'Ist nur ein Test', 'Test', '2020-01-23 13:51:32'),
(2, 'DerStr1k3r', 'Ist ein  Test und zwar der zweite.^^', 'Test2', '2020-01-23 14:12:36'),
(3, 'DerStr1k3r', 'juherl3klekl3', 'Test3', '2020-01-23 16:07:58'),
(4, 'DerStr1k3r', 'ja ja so ist das......', 'Test4', '2020-01-23 16:55:07');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `support`
--
ALTER TABLE `support`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `support`
--
ALTER TABLE `support`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

