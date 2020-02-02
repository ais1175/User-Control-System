--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int(12) NOT NULL,
  `username` varchar(255) NOT NULL DEFAULT '',
  `socialclubname` varchar(255) DEFAULT NULL,
  `password` varchar(2024) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `adminLevel` int(32) DEFAULT '0',
  `betaAcess` int(32) DEFAULT '0',
  `banAces` int(32) DEFAULT '1',
  `FirstLogin` datetime(6) DEFAULT NULL,
  `adminName` varchar(32) DEFAULT 'null'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `username`, `socialclubname`, `password`, `email`, `adminLevel`, `betaAcess`, `banAces`, `FirstLogin`, `adminName`) VALUES
(1, 'DerStr1k3r', 'DerStr1k3r', '$2y$10$a4cDIugxKCMt6IznUOXmZO8wH7n8WOJhcMEY2OIdeNHnNZJtPTH/.', 'str1k3r@eod-clan.eu', 10, 0, 1, NULL, 'null');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`,`username`) USING BTREE;

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;