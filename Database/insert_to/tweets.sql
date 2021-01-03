CREATE TABLE `tweets` (
  `id` int(11) NOT NULL,
  `username` varchar(16) NOT NULL,
  `msg` varchar(256) NOT NULL,
  `liked` int(11) NOT NULL DEFAULT '0',
  `posted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `tweets`
--

INSERT INTO `tweets` (`id`, `username`, `msg`, `liked`, `posted`) VALUES
(1, 'DerStr1k3r', 'Welcome to the UCP', 4, '2021-01-03 03:01:51');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

