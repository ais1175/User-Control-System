<?php
// ************************************************************************************//
// * User Control Panel ( UCP )
// ************************************************************************************//
// * Author: DerStr1k3r
// ************************************************************************************//
// * Version: 1.1
// * 
// * Copyright (c) 2020 DerStr1k3r. All rights reserved.
// ************************************************************************************//
// * License Typ: GNU GPLv3
// ************************************************************************************//
require_once("include/features.php");
	
$cookie = $_COOKIE["username"]; 

site_secure();
secure_url();
site_header();
site_navi_logged();
site_content_logged();

echo "
      <div class='content'>
                <div class='row'>
          <div class='col-md-12'>
            <div class='card'>
              <div class='card-header'>
                <h5 class='title'>Willkommen bei ".PROJECTNAME."!</h5>
                <p class='category'>User Control Panel | User Profile</p>
              </div>
              <div class='card-body'>
			<div class='row'>
		  <div class='col-md-4'>
            <div class='card card-user'>
              <div class='image'>
                <img src='themes/destiny-life/assets/img/bg5.jpg' alt='...'>
              </div>
              <div class='card-body'>
                <div class='author'>
                  <a href='#'>
                    <img class='avatar border-gray' src='themes/destiny-life/assets/img/mike.jpg' alt='...'>
                    <h5 class='title'>
						Whitelistsystem
					</h5>
                  </a>
                </div>
                <p class='description text-center'>
                <p class='description text-center'>
				<div style='padding:2px;width:100%;'>
					<div class='rules-item mb-6'>
						<h5>Grundlegendes</h5>
						<div class='ti-content'>
							<div class='ti-text'>
								<span><b>Auf ".PROJECTNAME." wird jede Whitelist in unseren Teamspeak Server abgehalten.</span></b><br /><br />
								<span>Verhalte dich wie folgt:</span><br /><br /> 
								<span>1. Lese vorher unser Regelwerk gut durch.</span><br />
								<span>2. Wenn du unser Regelwerk kannst, dann komm in unseren Teamspeak Server.</span><br />
								<span>3. Gehe nun in den folgenden Channel: Warte auf Whitelist</span><br />
								<span>4. Warte nun Bitte ab bis ein Supporter/in Zeit hat.</span><br />
								<span>5. Wir wünschen dir nun Viel Glück!</span>
							</div>
						</div>
					</div>
				</div>
				<br />				
                </p>
              </div>
            </div>
          </div>			
		  <div class='col-md-8'>
            <div class='card card-user'>
              <div class='image'>
                <img src='themes/destiny-life/assets/img/bg5.jpg' alt='...'>
              </div>
              <div class='card-body'>
                <div class='author'>
                  <a href='#'>
                    <img class='avatar border-gray' src='themes/destiny-life/assets/img/mike.jpg' alt='...'>
                    <h5 class='title'>
						Regelwerk
					</h5>
                  </a>
                </div>
                <p class='description text-center'>
				<div style='padding:2px;width:100%;'>
					<div class='rules-item mb-6'>
						<h5>Grundlegendes</h5>
						<div class='ti-content'>
							<div class='ti-text'>
								<span><b>".PROJECTNAME." ist ein Hardcore GTA - Rollenspiel Server, um allen eine gelungene Spielatmosphäre zu gewähren, solltet ihr auf realitätsferne RP-Situationen verzichten.</span></b><br /><br />
								<span>Wir wünschen uns: Benehmt Euch fair und geht respektvoll miteinander um.</span><br /> 
								<span>Die Projektleitung behält sich das Recht vor, das Regelwerk zu überarbeiten und zu ändern</span><br />
								<span>OOC, Safezone, Trolling, RDM, VDM, Metagaming. Scripted RP, Power RP, Fail RP sind Begriffe von denen wir erwarten, dass ihr Euch selbst dementsprechend informiert und wisst was es bedeutet.</span><br />
								<span>Für uns selbstverständlich - aber leider nicht für jeden Menschen - deshalb: Diskriminierung von Minderheiten, Extremismus, Rassismus, das Androhen oder Darstellen von sexueller Gewalt, das Darstellen geistiger oder extremer körperlicher Behinderung ist nicht gestattet.</span><br />
								<span>Die Nutzung von externen Programmen oder manipulierten Spieldateien die das Spielverhalten verändern könnten ist verboten</span><br />
								<span>Das Ausnutzen von ungewollten Spielmechaniken, technischen Fehlern oder Lücken im Regelwerk (Diese sind umgehend zu melden!) ist ebenfalls zu unterlassen.</span>
							</div>
						</div>
					</div>
				</div>
				<br />
				<div style='padding:2px;width:100%;'>
					<div class='rules-item mb-6'>
						<h5>Folgendes wollen wir hier nicht sehen und hören</h5>
						<div class='ti-content'>
							<div class='ti-text'>					
								<span><b>OOC, Safezone, Trolling, RDM, VDM, Metagaming. Scripted RP, Power RP, Fail RP sind Begriffe von denen wir erwarten, dass ihr Euch selbst dementsprechend informiert und wisst was es bedeutet.</span></b><br />
								<span>Für uns selbstverständlich – aber leider nicht für jeden Menschen - deshalb: Diskriminierung von Minderheiten, Extremismus, Rassismus, das Androhen oder Darstellen von sexueller Gewalt, das Darstellen geistiger oder extremer körperlicher Behinderungen. </span><br /> 
								<span>Die Nutzung von externen Programmen oder manipulierten Spieldateien, die das Spielverhalten verändern könnten</span><br />
								<span>Das Ausnutzen von ungewollten Spielmechaniken, technischen Fehlern oder Lücken im Regelwerk (Diese sind umgehend zu melden!).</span>
							</div>
						</div>
					</div>
				</div>
				<br />								
				<div style='padding:2px;width:100%;'>
					<div class='rules-item'>
						<h5>Roleplay</h5>
						<div class='ti-content'>
							<div class='ti-text'>
								<span>Safezone: Es gibt keine Safezone auf unserer Insel.</span><br />
								<span>Während einer aktiven RP-Situation, sowie während einer “Bewusstlosigkeit”, ist es dir untersagt das Spiel zu beenden. Spielabstürze sind davon nicht betroffen. </span><br />
								<span>Vollmaskierte Spieler sind nicht an ihrer Stimme, Redensart oder Kleidungsstil zu erkennen.</span><br />
								<span>Die offensichtliche Bedrohung mit einem gefährlichen Gegenstand gilt als Schussankündigung! Es muss aber aus der RP-Situation hervorgehen.</span><br />
								<span>Es ist zwingend erforderlich ein funktionstüchtiges Mikrofon mit angemessener Qualität zu verwenden. Störgeräusche müssen unmittelbar vor dem RP noch behoben werden.</span><br />
								<span>Solltest du mitbekommen, dass ein Mitspieler gegen die Serverregeln verstößt, bist du verpflichtet die aktive Situation zu Ende zu spielen. Danach kannst du den Support, bestenfalls mit Videobeweis, darüber informieren.</span><br />
								<span>RP-Situationen, die durch einen Serverabsturz oder -neustart unterbrochen wurden, sind auszuspielen sobald der Server wieder läuft, das gleiche gilt für Spielabstürze.</span>									
							</div>
						</div>
					</div>
				</div>
				<br />
				<div style='padding:2px;width:100%;'>
					<div class='rules-item'>
						<h5>Staats Fraktionen (LSPD, LSMC etc.)</h5>
						<div class='ti-content'>
							<div class='ti-text'>
								<span>Die Leitungen einer Staatlichen Fraktion (obersten zwei Ränge), dürfen aufgrund der Geltung ihrer Führungsposition, in keiner Weise korrupt sein.</span><br />
								<span>Beim LSMC herrscht Korruptionsverbot.</span>									
								</ul>
							</div>
						</div>
					</div>
				</div>
				<br />				
				<div style='padding:2px;width:100%;'>
					<div class='rules-item'>
						<h5>Voice</h5>
						<div class='ti-content'>
							<div class='ti-text'>
								<span>Dein TeamSpeak Nickname muss den Namen eures Charakters beinhalten, das gleiche gilt für den Discord Server.</span><br />
								<span>Stimmverzerrer sind nicht gestattet. Ausnahme: Hinrichtungen, Suizid, Ausreisen</span><br />
								<span>Es ist Pflicht, während man InGame ist, auf dem TeamSpeak Server connected zu sein und sich im “InGame”-Channel aufzuhalten. Andere TeamSpeak-Server dürfen während der aktiven Zeit in den Channeln nicht genutzt werden. Ausnahme: AFK-Bereich</span><br />
								<span>Andere Discord-Server für Informationsaustausch oder zur Nutzung eines “Funks” sind nicht gestattet. Ausnahme: Staatlicher Funk der mit dem Support abgesprochen wurde.</span><br />
								<span>Beim Verbinden mit unserem Server erklärst du dich damit einverstanden, dass der IngameVoiceChat aufgenommen und genutzt werden darf.</span><br />
								</ul>
							</div>
						</div>
					</div>
				</div>
				<br />
				<div style='padding:2px;width:100%;'>
					<div class='rules-item'>
						<h5>Charakter</h5>
						<div class='ti-content'>
							<div class='ti-text'>
								<span>Jeder Charakter muss eine Hintergrundstory besitzen und diese müsst ihr im RP passend abrufen könnt. Ein rasches Abändern der Herkunftsgeschichte ist verboten.</span><br />
								<span>Troll-Namen sind nicht gestattet. Bitte haltet eine gewisse realistische Namensgebung ein. Außerdem darf der Charaktername darf kein Name einer “Berühmtheit” sein. Auch wollen wir keine sehr bekannten Namen anderer Projekte sehen (Bsp. Ryan Butters, Manfred Lensch, Kurtis Kush). Die Supportleitung behält sich das Recht vor, den Namen zu ändern.</span><br />
								<span>Das Spielen eines nicht volljährigen Charakters ist nicht gestattet.</span><br />
								<span>Einen 2. Charakter zu erstellen ist frühestens nach einer Spielzeit von 1 Monat möglich und dann beim Support zu beantragen.</span><br />
								<span>Wenn der 1. Charakter in einer Gang ist, darf der 2. Charakter nicht ins PD oder in eine andere Gang, andersrum genauso.</span>
							</div>
						</div>
					</div>
				</div>
				<br />				
				<div style='padding:2px;width:100%;'>
					<div class='rules-item'>
						<h5>Hinrichtungen, Suizid, Ausreisen</h5>
						<div class='ti-content'>
							<div class='ti-text'>
								<span>In Absprache mit dem Support könnt ihr eine Hinrichtung beantragen. Wenn diese genehmigt wurde, dürfen die Mediziner die hingerichteten Spieler nicht behandeln. Der betroffene Charakter wird darüber nicht in Kenntnis gesetzt.</span><br />
								<span>Ebenfalls in Absprache mit dem Support können Ausreiseanträge oder Charakterlöschung erfolgen aber nur mit überzeugendem Rp Grund!</span>
							</div>
						</div>
					</div>
				</div>	
				<br />
				<div style='padding:2px;width:100%;'>
					<div class='rules-item'>
						<h5>Bewusstlosigkeit (New-Life-Regel)</h5>
						<div class='ti-content'>
							<div class='ti-text'>
								<span>Wenn du auf dem Boden liegst, kannst du alles hören und kannst situationsbedingt antworten. Dein Charakter liegt durch eine schmerzverzerrte Animation auf dem Boden. Du bist NICHT bewusstlos!</span><br />
								<span>Sollte kein Mediziner im Dienst sein, kannst du nach Ablauf des Timers beim Krankenhaus respawnen. Gespielte RP-Situation beendet.</span><br />
								<span>Anschließend darfst du dich eine halbe Stunde lang dem Unfallort nicht nähern.</span><br />
								<span>Der endgültige Tod kann nur durch eine Hinrichtung oder Suizid erfolgen. Danach wird der Charakter gelöscht.</span><br />
								<span>Direkte Racheaktionen sind für die Person aus dem Krankenhaus nicht erlaubt.</span>									
							</div>
						</div>
					</div>
				</div>
				<br />
				<div style='padding:2px;width:100%;'>
					<div class='rules-item'>
						<h5>Geiselnahme, Raub</h5>
						<div class='ti-content'>
							<div class='ti-text'>
								<span>Bei Geiselnahmen / Raub steht das RP im Vordergrund. So versuche keine übertriebenen Forderungen zu stellen, sondern in einem zumutbaren Verhältnis.</span><br />
								<span>Es müssen <b>3 Polizisten</b> im Dienst sein um Geiselnahmen und einen Raub durchzuführen. Bleibt fair auch bei kleinen Überfällen.</span>
							</div>
						</div>
					</div>
				</div>
				<br />
				<div style='padding:2px;width:100%;'>
					<div class='rules-item'>
						<h5>Gruppierungen, Gangs, Kriege</h5>
						<div class='ti-content'>
							<div class='ti-text'>
								<span>Während des Krieges ist jeder Anhänger einer Gang verpflichtet, die Farben dieser oder den Kleidungsstil, sichtbar zu tragen</span><br />
								<span>Eine Gruppierung darf aus maximal 20 Personen bestehen.</span><br />
								<span>Ein Gangkrieg kann nur mit vernünftigem RP-Hintergrund und supportseitiger Absegnung entstehen.</span><br />
								<span>Drive-By ist nur während des Gangkriegs erlaubt.</span><br />
								<span>Gangs, die sich in einem Krieg befinden, dürfen ohne Schussankündigung auf sich schießen. Weichen Zivis nicht aus, nach einer Warnung, zählt es als “Kollateralschaden” Trotzdem wird dazu aufgerufen diese zu vermeiden.)</span><br />
								<span>Ein Ende kann nur entstehen, wenn eine der Parteien aufgegeben hat und anschließend eine Rückmeldung an den Support gegeben hat.</span><br />
								<span>Eine Gang darf nicht AKTIV mit einer anderen Gang vorgehen.</span><br />
								<span>Das PD mit einer Gang zu stürmen ist nur erlaubt, wenn es im Support angefragt wird und auch nur dann, wenn die RP-Gründe dementsprechend schwerwiegend sind.</span>
							</div>
						</div>
					</div>
				</div>
				<br />
				<div style='padding:2px;width:100%;'>
					<div class='rules-item'>
						<h5>Sonstiges</h5>
						<div class='ti-content'>
							<div class='ti-text'>
								<span>Bei Verlust von Items, Autos, etc. muss ein Videobeweis oder aussagekräftigen Screenshots im Support gezeigt werden.</span><br />
								<span>Supportgespräche dürfen nicht aufgezeichnet werden.</span><br />
								<span>Bei Regelverstößen werden vom Support nur Spieler eingebunden, die auch aktiv an dem fehlerhaften RP beteiligt waren.</span><br />
								<span>Die Weitergabe oder gar der Verkauf eines Accounts ist strengstens untersagt.</span><br />
								<span>Das Verkaufen/Handeln von Ingame.Währung gegen Währungen außerhalb vom Projekt ist verboten.</span><br />
								<span>Namensänderungen bei z.B. einer Hochzeit müssen beim Support angefragt und genehmigt werden.</span><br />
								<span>Es ist dir verboten Streams und Chats anderer Spieler zu verfolgen, während zu InGame bist.</span><br />
								<span>Das Streamen und Aufzeichnen von Videos ist auf unserem Server erwünscht und gestattet.</span><br />
								<span>Bilder dürfen keine Teile des HUDs enthalten.</span><br />
								<span>Die Nutzungsrechte am Bild müssen gegeben sein.</span><br />
								<span>Bilder müssen aus der 3rd-Person- oder Ego Perspektive einer weiteren Person entstanden sein.</span><br />
								<span>Die Projektleitung darf ohne Angaben von Gründen einen permanenten Bann aussprechen.</span>
							</div>
						</div>
					</div>
				</div>
				<br />
				<div style='padding:2px;width:100%;'>
					<div class='rules-item'>
						<h5>Ein Appell an alle Spieler</h5>
						<div class='ti-content'>
							<div class='ti-text'>
								<span><b>Jeglicher Regelbruch MUSS unverzüglich beim Support gemeldet werden. Nur so können wir alle am Spielspaß profitieren.</b></span><br />
								<span>Bei Fragen über das Regelwerk, steht Euch der Support gerne zur Verfügung.</span>
								</ul>
							</div>
						</div>
					</div>
				</div>				
                </p>
              </div>
            </div>
          </div>		  
			</div>										
              </div>
            </div>
          </div>
        </div>
      </div>";
site_footer();	
?>