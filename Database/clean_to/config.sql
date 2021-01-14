--
-- Tabellenstruktur für Tabelle `config`
--

CREATE TABLE `config` (
  `id` int(11) NOT NULL,
  `site_dl_section` int(1) NOT NULL,
  `site_rage_section` int(1) NOT NULL,
  `site_altv_section` int(1) NOT NULL,
  `site_fivem_section` int(1) NOT NULL,
  `site_online` int(1) NOT NULL,
  `site_name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `config`
--

INSERT INTO `config` (`id`, `site_dl_section`, `site_rage_section`, `site_altv_section`, `site_fivem_section`, `site_online`, `site_name`) VALUES
(1, 1, 1, 1, 1, 1, 'UCP Demo');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `config`
--
ALTER TABLE `config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;
