--
-- Tabellenstruktur für Tabelle `tweets`
--

CREATE TABLE `tweets` (
  `id` int(11) NOT NULL,
  `username` varchar(16) NOT NULL,
  `msg` varchar(256) NOT NULL,
  `liked` varchar(11) NOT NULL,
  `posted` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `tweets`
--

INSERT INTO `tweets` (`id`, `username`, `msg`, `liked`, `posted`) VALUES
(1, 'DerStr1k3r', 'Welcome to the UCP!', '2', '15:05');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `tweets`
--
ALTER TABLE `tweets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `tweets`
--
ALTER TABLE `tweets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

