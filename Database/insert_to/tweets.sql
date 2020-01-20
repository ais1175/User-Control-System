--
-- Tabellenstruktur für Tabelle `tweets`
--

CREATE TABLE `tweets` (
  `id` int(11) NOT NULL,
  `username` varchar(24) NOT NULL,
  `msg` varchar(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `tweets`
--

INSERT INTO `tweets` (`id`, `username`, `msg`) VALUES
(16, 'DerStr1k3r', 'Dann sei mal so nett 5.230.159.25   grins'),
(17, 'DerStr1k3r', 'np'),
(18, 'Str1k3r', 'np 57z6');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;
