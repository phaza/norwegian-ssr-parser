<?php namespace Phaza\SSR\Feature;

use Phaza\SSR\Exceptions\UnknownNameTypeException;

/**
 * Represents a given type on a feature.
 * This can be anything from a mountain or valley, to a cabin or a pole in the ocean.
 *
 * @package Phaza\SSR\Feature
 */
class NameType {

	private $nameType;

	/**
	 * Creates a new object with the given name type
	 * @throws UnknownNameTypeException
	 * @param $language
	 */
	public function __construct($nameType) {
		if(!in_array($nameType, array_keys($this->nameTypes))) {
			throw new UnknownNameTypeException(sprintf("Value was '%s'", $nameType));
		}

		$this->nameType = $nameType;
	}

	public function getNameType() {
		return $this->nameType;
	}

	public function getNameTypeDescription() {
		return $this->nameTypes[$this->nameType];
	}

	private $nameTypes = [
		  '1' => [ 'name' => 'Berg', 'description' => 'Mindre fjell' ],
		  '2' => [ 'name' => 'Fjell', 'description' => 'Stort fjell' ],
		  '3' => [ 'name' => 'Fjellområde', 'description' => 'Stort fjellområde. Eks. Rondane, Saltfjellet, Lyseheiane.' ],
		  '4' => [ 'name' => 'Hei', 'description' => 'Berglendt, høyere beliggende område med beitemark.' ],
		  '5' => [ 'name' => 'Høyde', 'description' => 'Mindre terrengform som ikke vurderes som fjell.' ],
		  '6' => [ 'name' => 'Ås', 'description' => 'Langstrakt høydedrag' ],
		  '7' => [ 'name' => 'Rygg', 'description' => 'Langstrakt terrengform' ],
		  '8' => [ 'name' => 'Haug', 'description' => 'Liten, markant terrengform' ],
		  '9' => [ 'name' => 'Bakke', 'description' => 'Skråning' ],
		 '10' => [ 'name' => 'Li', 'description' => 'Skrånende terreng' ],
		 '11' => [ 'name' => 'Stup', 'description' => 'Loddrett eller svært bratt, fallende terreng.' ],
		 '12' => [ 'name' => 'Vidde', 'description' => 'Høyereliggende, større område uten stor skog med lave terrengvariasjoner innenfor området. Eks. Valdresflye, Hardangervidda, Finnmarksvidda.' ],
		 '13' => [ 'name' => 'Slette', 'description' => 'Åpent, flatt, ikke skogbevokst, område' ],
		 '14' => [ 'name' => 'Mo', 'description' => 'Flatt område, vanligvis skogkledd' ],
		 '15' => [ 'name' => 'Dalføre', 'description' => 'Stor dal med sidedaler. Eks. Gudbrandsdalen, Namdalen, Setesdal, Valdres.' ],
		 '16' => [ 'name' => 'Dal', 'description' => 'Mellomstor eller liten dal' ],
		 '17' => [ 'name' => 'Botn', 'description' => 'Innerste del av dal; rundaktig, bratt dal el. uthulning i fjellet.' ],
		 '18' => [ 'name' => 'Skar', 'description' => 'Markant senkning i fjell el. berg' ],
		 '19' => [ 'name' => 'Juv', 'description' => 'Kløftlignende dal, canyon' ],
		 '20' => [ 'name' => 'Søkk', 'description' => 'Mindre markant, begrenset fordypning' ],
		 '21' => [ 'name' => 'Stein', 'description' => 'Frittliggende stor stein(blokk), f.eks. flyttstein (fra istiden) i fjellet.' ],
		 '22' => [ 'name' => 'Heller', 'description' => 'Utoverhengende bergvegg, berghule, oppbygd steinsatt overnattingssted.' ],
		 '30' => [ 'name' => 'Innsjø', 'description' => 'Stort vann. Eks. Altevatnet, Femunden, Mjøsa, Nisser, Byglandsfjord' ],
		 '31' => [ 'name' => 'Vann', 'description' => 'Middels stort vann' ],
		 '32' => [ 'name' => 'Tjern', 'description' => 'Lite vann' ],
		 '33' => [ 'name' => 'Pytt', 'description' => 'Liten dam, myrpytt' ],
		 '34' => [ 'name' => 'Sund', 'description' => 'Innsnevret område i vann eller vassdrag' ],
		 '35' => [ 'name' => 'Vik', 'description' => 'Kil, bukt i vann eller vassdrag' ],
		 '36' => [ 'name' => 'Elv', 'description' => 'Rennende vann i naturlig vannvei, vanligvis bredere enn 3 meter' ],
		 '37' => [ 'name' => 'Bekk', 'description' => 'Rennende vann i naturlig vannvei, vanligvis smalere enn 3 meter' ],
		 '38' => [ 'name' => 'Grøft', 'description' => 'Rennende vann i oppgravd vannvei , f.eks. dreneringsgrøft i myr' ],
		 '39' => [ 'name' => 'Foss', 'description' => 'Vann i tilnærmet fritt fall' ],
		 '40' => [ 'name' => 'Stryk', 'description' => 'Del av elv, bekk der vannet går i stryk (og skiller seg tydelig fra resten av elva/bekken)' ],
		 '41' => [ 'name' => 'Os', 'description' => 'Innløp eller utløp av elv eller bekk i innsjø/vann/tjern eller sjø (saltvann)' ],
		 '42' => [ 'name' => 'Høl', 'description' => 'Dyp elvebunn under foss eller etter et stryk' ],
		 '43' => [ 'name' => 'Lon', 'description' => 'Utbuktning i elv eller bekk med stille vann' ],
		 '44' => [ 'name' => 'Øy', 'description' => 'Tørt landområde i ferskvann atskilt fra fastlandet' ],
		 '45' => [ 'name' => 'Holme', 'description' => 'Liten øy i ferskvann' ],
		 '46' => [ 'name' => 'Halvøy', 'description' => 'Større nes i ferskvann med smalt eid mot fastland' ],
		 '47' => [ 'name' => 'Nes', 'description' => 'Landområde stikkende ut i ferskvann' ],
		 '48' => [ 'name' => 'Eid', 'description' => 'Landstripe med vann på begge sider som binder sammen to landområder' ],
		 '49' => [ 'name' => 'Strand', 'description' => 'Sand-, grus- eller steindekket område i vannkanten (både for elv og vann)' ],
		 '50' => [ 'name' => 'Isbre', 'description' => 'Større, sammenhengende snø- og isområde som ikke smelter i løpet av sommeren. Eks. Svartisen, Folgefonna, Øksfjordjøkelen' ],
		 '51' => [ 'name' => 'Fonn', 'description' => 'Liten snø- eller isflate, snøfonn som ikke smelter i løpet av sommeren' ],
		 '52' => [ 'name' => 'Skjær', 'description' => 'Fjell eller stein i vannflaten' ],
		 '53' => [ 'name' => 'Båe', 'description' => 'Fjell eller stein under vannflaten' ],
		 '54' => [ 'name' => 'Grunne', 'description' => 'Lite område under vann' ],
		 '55' => [ 'name' => 'Banke', 'description' => 'Flatt, større undervannsområde' ],
		 '56' => [ 'name' => 'Vanndetalj', 'description' => 'Alle typer. Skriv forklaring i merknadsfeltet.' ],
		 '60' => [ 'name' => 'Skog', 'description' => 'Alle typer fra stor barskog til og med vierkratt i Finnmark' ],
		 '61' => [ 'name' => 'Myr', 'description' => 'Alle typer fra åpen gressmyr til våt moldjord dekket med kjerr' ],
		 '62' => [ 'name' => 'Utmark', 'description' => 'Ikke inngjerdet beitemark' ],
		 '63' => [ 'name' => 'Sva', 'description' => 'Bart fjell-/steinparti' ],
		 '64' => [ 'name' => 'Ur', 'description' => 'Steinområde, steinrøys' ],
		 '65' => [ 'name' => 'Øyr', 'description' => 'Sand-/grusområde i elvemunning, elvedelta både mot innsjø/vann og saltvann' ],
		 '66' => [ 'name' => 'Sand', 'description' => 'Sand-/grusområde over vannkontur/kystkontur; morenemateriale' ],
		 '67' => [ 'name' => 'Eng', 'description' => 'Kultivert slåtte-/gressmark' ],
		 '68' => [ 'name' => 'Jorde', 'description' => 'Kultivert dyrkamark' ],
		 '69' => [ 'name' => 'Havnehage', 'description' => 'Inngjerdet beitemark' ],
		 '70' => [ 'name' => 'Torvtak', 'description' => 'Sted for uttak av myrtorv/brenntorv/veksttorv' ],
		 '71' => [ 'name' => 'Setervoll', 'description' => 'Ryddet, gressbevokst område på seter uten hus (Se også Seter 111)' ],
		 '72' => [ 'name' => 'Park', 'description' => 'Kultivert område med eller uten trær, kolonihage (i by eller tettbygd strøk)' ],
		 '80' => [ 'name' => 'Fjord', 'description' => 'Arm av havet inn i fastlandet' ],
		 '81' => [ 'name' => 'Havområde', 'description' => 'Stort havområde. Eks. Barentshavet, Nordsjøen, Atlanterhavet' ],
		 '82' => [ 'name' => 'Sund i sjø', 'description' => 'Innsnevret område mellom øyer eller fastland' ],
		 '83' => [ 'name' => 'Vik i sjø', 'description' => 'Kil, bukt' ],
		 '84' => [ 'name' => 'Øy i sjø', 'description' => 'Tørt landområde atskilt fra fastlandet' ],
		 '85' => [ 'name' => 'Holme i sjø', 'description' => 'Liten øy / lite skjær' ],
		 '86' => [ 'name' => 'Halvøy i sjø', 'description' => 'Større nes med smalt eid mot fastland' ],
		 '87' => [ 'name' => 'Nes i sjø', 'description' => 'Landområde stikkende ut i sjø' ],
		 '88' => [ 'name' => 'Eid i sjø', 'description' => 'Landstripe med sjø på begge sider som binder sammen to landområder' ],
		 '89' => [ 'name' => 'Strand i sjø', 'description' => 'Sand-, grus- eller steindekket område i sjøkanten' ],
		 '90' => [ 'name' => 'Skjær i sjø', 'description' => 'Fjell eller stein i vannflaten' ],
		 '91' => [ 'name' => 'Båe i sjø', 'description' => 'Fjell eller stein under vannflaten' ],
		 '92' => [ 'name' => 'Grunne i sjø', 'description' => 'Forhøyning på bunnen som skiller seg vesentlig fra høyden på bunnen omkring' ],
		 '93' => [ 'name' => 'Renne/kløft i sjø', 'description' => 'Undersjøisk dal, kanal, senkning, ravine, fure, spor, rille' ],
		 '94' => [ 'name' => 'Banke i sjø', 'description' => 'Flatt, større undervannsområde eller flak' ],
		 '95' => [ 'name' => 'Bakke i sjø', 'description' => 'Skrånende sjøbunn; skråning' ],
		 '96' => [ 'name' => 'Søkk i sjø', 'description' => 'Stor eller liten grop på sjøbunnen; hull, høl, åpning' ],
		 '97' => [ 'name' => 'Dyp (havdyp)', 'description' => 'Område mer enn 200–300 meter under havflaten' ],
		 '98' => [ 'name' => 'Rygg i sjø', 'description' => 'Undersjøisk ås, åskam, fjellrygg' ],
		 '99' => [ 'name' => 'Egg i sjø', 'description' => 'Undersjøisk kant mot havdyp' ],
		'100' => [ 'name' => 'By', 'description' => 'Bymessig tettsted med handels- og servicefunksjoner og konsentrert bebyggelse, jf. kommunelovens § 3 punkt 5. Skriv vedtaksdato i merknadsfeltet om bystatus er gitt før eller etter 1996.' ],
		'101' => [ 'name' => 'Tettsted', 'description' => 'Mindre, bymessig bebygd område med sentrumskarakter' ],
		'102' => [ 'name' => 'Tettbebyggelse', 'description' => 'Mindre, bebygd område uten sentrumskarakter, f.eks. boligområde' ],
		'103' => [ 'name' => 'Bygdelag (bygd)', 'description' => 'Stort, uregulert gards- og boligområde' ],
		'104' => [ 'name' => 'Grend', 'description' => 'Mindre, uregulert gards-, seter- og boligområde' ],
		'105' => [ 'name' => 'Boligfelt', 'description' => 'Regulert boligområde' ],
		'106' => [ 'name' => 'Borettslag', 'description' => 'Bofellesskap, vanligvis blokkbebyggelse' ],
		'107' => [ 'name' => 'Industriområde', 'description' => 'Større, sammenhengende område til industri- og næringsformål' ],
		'108' => [ 'name' => 'Bruk', 'description' => 'Bruksnavn, vanligvis (større) landbrukseiendom (jf. § 8 i lov om stadnamn, og § 54 i matrikkelforskriften). Navn på én eiendom med ett bruksnummer under ett gardsnummer. Objektkoordinaten ligger normalt på våningshuset (hvis dette finnes).' ],
		'109' => [ 'name' => 'Enebolig/mindre boligbygg', 'description' => 'Navn på mindre eiendom for fast bosetting. Hovedsaklig eiendom hvor eier kan bestemme skrivemåten (jf. § 8 i lov om stadnamn og § 54 i matrikkelforskriften). Kan også omfatte eget navn på bygg, eller våningshus/gardsbruk som ikke er gitt eget matrikkelnummer på større eiendom.' ],
		'110' => [ 'name' => 'Fritidsbolig (hytte, sommerhus)', 'description' => 'Hus som ikke er ment for fast bosetting' ],
		'111' => [ 'name' => 'Seter (sel, støl)', 'description' => 'Enklere landbruksbebyggelse. Kan ha periodisk fast bosetting, vanligvis sommerstid' ],
		'112' => [ 'name' => 'Bygg for jordbruk, fiske og fangst', 'description' => 'Bu, naust, uthus, fjøs, liten skogskoie, gamme' ],
		'113' => [ 'name' => 'Fabrikk', 'description' => 'Større industrivirksomhet' ],
		'114' => [ 'name' => 'Kraftstasjon', 'description' => 'Alle typer / alle størrelser til energiproduksjon (f.eks. el. og varme)' ],
		'115' => [ 'name' => 'Annen industri- og lagerbygning', 'description' => 'Mindre industri-, produksjons- og lagervirksomhet' ],
		'116' => [ 'name' => 'Forretningsbygg', 'description' => 'Hus for kontor- og servicevirksomhet' ],
		'117' => [ 'name' => 'Hotell', 'description' => 'Større offentlig godkjent overnattingssted' ],
		'118' => [ 'name' => 'Pensjonat', 'description' => 'Mindre offentlig godkjent overnattingssted' ],
		'119' => [ 'name' => 'Turisthytte', 'description' => 'Overnattingssted utenfor tettbygd område' ],
		'120' => [ 'name' => 'Skole', 'description' => 'Offentlig og privat skole' ],
		'121' => [ 'name' => 'Sykehus', 'description' => 'Offentlig og privat sykehus' ],
		'122' => [ 'name' => 'Helseinstitusjon', 'description' => 'Aldershjem, rekreasjonshjem o.l.' ],
		'123' => [ 'name' => 'Kirke', 'description' => 'Kirke/kapell/arbeidskirke knyttet til Den norske kirke' ],
		'125' => [ 'name' => 'Forsamlingshus/kulturhus', 'description' => 'Teater, kino, samfunnshus, grendehus o.l.' ],
		'126' => [ 'name' => 'Vaktstasjon/beredsskapsbygning', 'description' => 'Bygning for politi/brann/los/toll/ambulanse/fly- og skipsovervåkning' ],
		'127' => [ 'name' => 'Militært bygg/anlegg', 'description' => 'Militærleir, militært bygg' ],
		'128' => [ 'name' => 'Idrettshall', 'description' => 'Alle typer innendørsanlegg, f.eks. ishall, svømmehall, idrettshall, ridehall. Skriv i merknadsfelt hvilken type.' ],
		'129' => [ 'name' => 'Fyr (fyrstasjon)', 'description' => 'Offisielt fyr og fyrstasjon langs kysten' ],
		'130' => [ 'name' => 'Lykt (fyrlykt)', 'description' => 'Offisiell og privat lykt/fyrlykt langs kysten og i innlandet' ],
		'131' => [ 'name' => 'TV-/radiomast TV-/radio-/mobiltelefontårn.', 'description' => 'Alle typer bakkebasert telekommunikasjon' ],
		'132' => [ 'name' => 'Bydel', 'description' => 'Kulturmessig del av by, f.eks. Gamlebyen, Posebyen, Nordnes, Lade, Tromsdalen. (Se også Adm. bydel 269.)' ],
		'140' => [ 'name' => 'Adressenavn (veg/gate)', 'description' => 'Offisielt adressenavn (veg-/gatenavn), jf. § 2 bokstav e i matrikkelforskriften. Bruk ellers kode 240 Vegstrekning.' ],
		'142' => [ 'name' => 'Traktorveg', 'description' => 'Driftsveg for kjøretøy som ikke kan kjøres med vanlig bil' ],
		'143' => [ 'name' => 'Sti', 'description' => 'Stistrekning, råk, slepe (gammel drifteveg), reindriftsveg' ],
		'144' => [ 'name' => 'Farled/skipslei', 'description' => 'Normal seilingslei for skip, f.eks. Trondheimsleia' ],
		'145' => [ 'name' => 'Ferjestrekning', 'description' => 'Ferjesamband som inngår i områdets samferdselsnett' ],
		'146' => [ 'name' => 'Bru', 'description' => 'Både for veg og jernbane. Angi ett punkt i hver ende for store bruer og ett midt på for både store og små bruer.' ],
		'147' => [ 'name' => 'Klopp', 'description' => 'Liten gangbru av stokker og/eller stein over bekker og elver, i myr eller i fjæra' ],
		'148' => [ 'name' => 'Tunnel', 'description' => 'Vanlig tunnel, rasoverbygg og undergang på gangveg, veg og jernbane. Angi ett punkt i hver ende for lange og ett punkt midt på for både lange og korte tunneler.' ],
		'149' => [ 'name' => 'Vegkryss (veg/gate)', 'description' => 'For alle typer veger/gater både offisielle kryssnavn eller lokale navn på offentlige eller private veier f.eks Sinsenkrysset, Sluppen.' ],
		'150' => [ 'name' => 'Vegbom', 'description' => 'Mindre bom/automat på privat veg' ],
		'151' => [ 'name' => 'Bomstasjon', 'description' => 'Større bomanlegg på offentlig veg' ],
		'152' => [ 'name' => 'Grind', 'description' => 'Port i gjerde' ],
		'153' => [ 'name' => 'Parkeringsplass', 'description' => 'Offentlig og privat' ],
		'154' => [ 'name' => 'Kai', 'description' => 'Større, fastbygd bryggeanlegg' ],
		'155' => [ 'name' => 'Brygge', 'description' => 'Mindre, fastbygd bryggeanlegg' ],
		'156' => [ 'name' => 'Ferjekai', 'description' => 'Punktet/koordinaten legges på ferjelemmen på kaia' ],
		'157' => [ 'name' => 'Utstikker', 'description' => 'Flytende bryggeanlegg' ],
		'158' => [ 'name' => 'Sluse', 'description' => 'Kunstig løfteanretning for båter i vassdrag' ],
		'159' => [ 'name' => 'Kanal', 'description' => 'Utgravd vannveg i sjø og ferskvann' ],
		'160' => [ 'name' => 'Ankringsplass', 'description' => 'F.eks. opplagsplass for store båter/skip' ],
		'161' => [ 'name' => 'Stasjon', 'description' => 'Betjent stoppested for jernbane og trikk' ],
		'162' => [ 'name' => 'Holdeplass', 'description' => 'Ubetjent stoppested for jernbane og trikk' ],
		'163' => [ 'name' => 'Busstopp', 'description' => 'Stoppested for rutegående vegtrafikk' ],
		'164' => [ 'name' => 'Flyplass', 'description' => 'Landingsplass for rutegående flytrafikk og regulert privat flygning' ],
		'165' => [ 'name' => 'Landingsstripe', 'description' => 'Landingsplass for privat flygning' ],
		'170' => [ 'name' => 'Eiendom', 'description' => 'Eiendomsnavn (Skal IKKE brukes ved senere registreringer)' ],
		'180' => [ 'name' => 'Nasjon', 'description' => 'Selvstendig stat / land (offisielt navn)' ],
		'181' => [ 'name' => 'Fylke', 'description' => 'Offisielt navn' ],
		'182' => [ 'name' => 'Kommune', 'description' => 'Offisielt navn' ],
		'183' => [ 'name' => 'Sogn', 'description' => 'Kirkesogn i Den norske kirke' ],
		'184' => [ 'name' => 'Grunnkrets', 'description' => 'Se også 253 Annen adm. inndeling' ],
		'185' => [ 'name' => 'Allmenning', 'description' => 'Område hvor rettighetene er regulert og fordelt på flere. Alle typer. Angi type i merknadsfeltet.' ],
		'186' => [ 'name' => 'Skytefelt', 'description' => 'Militært skytefelt både på land og sjø.' ],
		'187' => [ 'name' => 'Verneområde', 'description' => 'Alle typer på sjø og land. Angi type, f.eks. nasjonalpark, landskapsvernområde i merknadsfeltet' ],
		'188' => [ 'name' => 'Soneinndeling til havs', 'description' => 'Fiskerisone, havrettssone o.l. Angi type i merknadsfeltet.' ],
		'190' => [ 'name' => 'Idrettsanlegg', 'description' => 'Alle typer utendørsanlegg. Skriv type i merknadsfeltet, f.eks. motorsportbane, ridebane, fotballbane.' ],
		'191' => [ 'name' => 'Campingplass', 'description' => 'Alle typer, med/uten campinghytter, campingvogner og telt' ],
		'192' => [ 'name' => 'Skiheis', 'description' => 'Skitrekk og stolheis i skianlegg' ],
		'193' => [ 'name' => 'Fjellheis', 'description' => 'Gondolbane og trallebane for frakt av folk til fjells' ],
		'194' => [ 'name' => 'Slalåm- og utforbakke', 'description' => 'Alle typer regulerte alpinanlegg' ],
		'195' => [ 'name' => 'Småbåthavn', 'description' => 'Regulert havneanlegg for småbåter' ],
		'196' => [ 'name' => 'Rørledning', 'description' => 'Alle typer rørledninger, til olje, gass, vann, o.l.' ],
		'197' => [ 'name' => 'Oljeinstallasjon (sjø)', 'description' => 'Stasjonære oljeinstallasjoner (faste og flytende)' ],
		'198' => [ 'name' => 'Kraftledning', 'description' => 'Store strømoverføringsledninger' ],
		'199' => [ 'name' => 'Kraftgate (rørgate)', 'description' => 'Store tilførselsrør for kraftanlegg' ],
		'200' => [ 'name' => 'Kabel', 'description' => 'Alle typer kabler i sjø og ferskvann' ],
		'201' => [ 'name' => 'Dam', 'description' => 'Både store reguleringsdammer og små fløtningsdammer. Angi ett punkt i hver ende for lange og ett punkt midt på for både lange og korte damkroner.' ],
		'202' => [ 'name' => 'Tømmerrenne', 'description' => 'Kunstig tømmerfløtningsanlegg' ],
		'203' => [ 'name' => 'Taubane', 'description' => 'Heis til frakt av høy/gods, ikke persontrafikk. (Se også 193 Fjellheis.)' ],
		'204' => [ 'name' => 'Fløtningsanlegg', 'description' => 'Kunstig fløtningsanlegg' ],
		'205' => [ 'name' => 'Fiskeoppdrettsanlegg', 'description' => 'På land, i sjø og i ferskvann' ],
		'206' => [ 'name' => 'Gammel bosettingsplass', 'description' => 'Nedlagt bruk, seter, boplass, gamme. Merk! Husa er borte eller kun ruin' ],
		'207' => [ 'name' => 'Offersted', 'description' => 'Samisk, norsk eller kvensk offersted' ],
		'208' => [ 'name' => 'Severdighet', 'description' => 'Skriv forklaring i merknadsfeltet, f.eks. ’minnesmerke’' ],
		'209' => [ 'name' => 'Utsiktspunkt', 'description' => 'Både i tårn og på bakken, f.eks. Kongens utsikt' ],
		'210' => [ 'name' => 'Skytebane', 'description' => 'Pistol-/geværbane o.l.' ],
		'211' => [ 'name' => 'Topp (fjelltopp/tind)', 'description' => 'Øverste fjelltopp' ],
		'212' => [ 'name' => 'Hylle (hjell)', 'description' => 'Flatt tilnærmet vannrett område i fjellside.' ],
		'213' => [ 'name' => 'Terrengdetalj', 'description' => 'Alle typer små naturdetaljer, f.eks. groper, sprekker, hulveier, sand-/stein- /grusflater. Skriv forklaring i merknadsfeltet.' ],
		'214' => [ 'name' => 'Øygruppe', 'description' => 'To eller flere øyer i ferskvann' ],
		'215' => [ 'name' => 'Våg i sjø', 'description' => 'Fjordarm, større vik' ],
		'216' => [ 'name' => 'Øygruppe i sjø', 'description' => 'To eller flere øyer. Eks. Hvaler, Lofoten' ],
		'217' => [ 'name' => 'Klakk i sjø', 'description' => 'Spiss grunne' ],
		'218' => [ 'name' => 'Bergverk (underjord./dagbrudd)', 'description' => 'Gruve, skjerp, mineraluttak' ],
		'219' => [ 'name' => 'Jernbanestrekning', 'description' => 'Lang jernbanestrekning. Eks. Ofotbanen, Bergensbanen' ],
		'220' => [ 'name' => 'Vad', 'description' => 'Grunt (vade)sted i elv, bekk, vann eller sjø' ],
		'221' => [ 'name' => 'Havn', 'description' => 'Sted der fartøy laster, losser eller søker ly for vær og sjø' ],
		'222' => [ 'name' => 'Badeplass', 'description' => 'Offentlig og privat badeplass' ],
		'223' => [ 'name' => 'Fornøyelsespark', 'description' => 'Bare store, regulerte anlegg' ],
		'224' => [ 'name' => 'Melkeplass', 'description' => 'Seterplass uten hus men kan ha tak, vanligvis i bratte lier på Vestlandet' ],
		'225' => [ 'name' => 'Annen kulturdetalj', 'description' => 'Alle typer kulturdetaljer, f.eks. lekeplass, utkikkstårn, fiskeplass, o.l. Skriv hva det er i merknadsfeltet.' ],
		'226' => [ 'name' => 'Grustak/steinbrudd', 'description' => 'Uttaksplass/-område for sand, grus, pukk, skifer eller stein (Se også Bergverk 218)' ],
		'227' => [ 'name' => 'Tømmervelte', 'description' => 'Midlertidig lagringsplass for tømmer' ],
		'228' => [ 'name' => 'Hyttefelt', 'description' => 'Offentlig/privat hyttefelt eller relativt tettbygd hytteområde.' ],
		'229' => [ 'name' => 'Barnehage', 'description' => 'Offentlig og privat barnehage' ],
		'230' => [ 'name' => 'Poststed', 'description' => 'Offisielt poststed /postnummerområde' ],
		'232' => [ 'name' => 'Plass/torg', 'description' => 'I tettsted eller by' ],
		'233' => [ 'name' => 'Gjerde', 'description' => 'Steingjerde, tregjerde o.l.' ],
		'234' => [ 'name' => 'Stø', 'description' => 'Båtstø, båtplass (uten naust) i vannkanten' ],
		'235' => [ 'name' => 'Gravplass', 'description' => 'Alle typer gravlunder, gravplasser' ],
		'236' => [ 'name' => 'Molo', 'description' => 'Fast byggverk, utstikkende voll i sjøen' ],
		'237' => [ 'name' => 'Rådhus (kommune, fylke, stat)', 'description' => 'Administrasjonssenteret (-huset) i den administrative enheten' ],
		'238' => [ 'name' => 'Elvemel', 'description' => 'Bratt sand- eller grusskråning langs elv eller vann' ],
		'239' => [ 'name' => 'Fjellside', 'description' => 'Åpent, skrånende terreng i fjellet.' ],
		'240' => [ 'name' => 'Vegstrekning', 'description' => 'Fjellovergang, turiststrekning, uoffisielt vegnavn. Eks. Kvænangsfjellet, Gamle Bynesveg, Friisvegen' ],
		'241' => [ 'name' => 'Fjordmunning', 'description' => 'Område ytterst i en fjord' ],
		'242' => [ 'name' => 'Nes ved elver', 'description' => 'Landet mellom to møtende elver. Brukt (helst) i samiske områder. Stedsnavnets  skrivemåte skal IKKE avgjøre om navnet skal gis denne koden, men KUN lokalitetens størrelse og/eller fasong.' ],
		'243' => [ 'name' => 'Kilde', 'description' => 'Oppkomme, olle, ile. Benyttes for å angi stedet hvor vannkilden/grunnvannet kommer i dagen.' ],
		'244' => [ 'name' => 'Senkning', 'description' => 'Flat forsenkning, dalsenkning' ],
		'245' => [ 'name' => 'Fjellkant (aksel)', 'description' => 'Skulder, nese, bryn' ],
		'246' => [ 'name' => 'Skogområde', 'description' => 'Stort skogområde. Eks. Nordmarka, Bymarka, Finnskogen.' ],
		'247' => [ 'name' => 'Landskapsområde', 'description' => 'Stort landskapsområde. Eks. Dalane, Jæren, Romerike, Grenland, Salten, Varanger' ],
		'248' => [ 'name' => 'Universitet/høgskole', 'description' => 'Offentlig og privat høgskole og universitet' ],
		'249' => [ 'name' => 'Annen bygning for religiøs aktivitet', 'description' => 'Synagoge, moské, frikirke, menighetshus, kloster, gravkapell, bårehus, krematorium. Skriv i merknadsfelt hvilken type.' ],
		'250' => [ 'name' => 'Fengsel', 'description' => 'Fengsel, arbeidskoloni' ],
		'251' => [ 'name' => 'Museum/galleri/bibliotek', 'description' => 'Alle typer museum, galleri og bibliotek' ],
		'252' => [ 'name' => 'Garasje/hangarbygg', 'description' => 'Parkeringshus/trikkestall/bussgarasje/flyhangar/lokomotivstall' ],
		'253' => [ 'name' => 'Annen adm. inndeling', 'description' => 'Landsdel, havnedistrikt, politidistrikt, bispedømme, prestegjeld, skolekrets, valgkrets, postområde, o.l. Angi type i merknadsfeltet.' ],
		'254' => [ 'name' => 'Varde', 'description' => 'F.eks. merkerøys, steinrøys, langs kysten og i innlandet' ],
		'255' => [ 'name' => 'Sjøstykke', 'description' => 'Del av sjøen, vanligvis innaskjærs eller i kystnære farvann. Eks. Folda, Hustadvika' ],
		'256' => [ 'name' => 'Fiskeplass i sjø', 'description' => 'Fiskested, fiskemed' ],
		'257' => [ 'name' => 'Del av innsjø', 'description' => 'Mindre del av stor innsjø. Eks. Steinsfjorden i Tyrifjorden' ],
		'258' => [ 'name' => 'Grensemerke', 'description' => 'Off. godkjent grensemerke; varde, tre, stein, bolt, kors o.l.' ],
		'259' => [ 'name' => 'Boligblokk', 'description' => 'Stort boligbygg med to eller flere etasjer hvor det er 5 eller flere boligenheter' ],
		'260' => [ 'name' => 'Grotte', 'description' => 'Naturlig fjellgrotte f.eks. Grønnligrotta (Rana)' ],
		'261' => [ 'name' => 'Gruppe av vann', 'description' => 'To eller flere middels store vann' ],
		'262' => [ 'name' => 'Gruppe av tjern', 'description' => 'To eller flere små vann' ],
		'263' => [ 'name' => 'Skred', 'description' => 'Rasområde med stein, jord, sand, leire' ],
		'264' => [ 'name' => 'Fyllplass', 'description' => 'Plass for deponering av masse som stein/jord/søppel.' ],
		'265' => [ 'name' => 'Holmegruppe i sjø', 'description' => 'To eller flere små skjær' ],
		'266' => [ 'name' => 'Tettsteddel', 'description' => 'Kulturmessig del av tettsted. (Se også navnetype 101 Tettsted.)' ],
		'267' => [ 'name' => 'Serveringssted', 'description' => 'Serveringssted uten overnatting utenfor tettbygd område for eksempel Skistua (Trondheim), Ringkollstua (Ringerike), Turnerhytten (Bergen), Skihytta (Kirkenes)' ],
		'269' => [ 'name' => 'Adm. bydel', 'description' => 'Offisielt navn på bydelsforvaltningen i et angitt område. (Se også 132 Bydel.)' ],
		'270' => [ 'name' => 'Adm. tettsted', 'description' => 'Etter Statistisk sentralbyrås spesifikasjon' ],
		'272' => [ 'name' => 'Lanterne', 'description' => 'Offisiell og privat lanterne langs kysten og i innlandet, fast' ],
		'273' => [ 'name' => 'Stang', 'description' => 'Offisiell og privat jernstang langs kysten og i innlandet, fast' ],
		'274' => [ 'name' => 'Stake', 'description' => 'Offisiell og privat stake langs kysten og i innlandet, flytende' ],
		'275' => [ 'name' => 'Lysbøye', 'description' => 'Offisiell og privat lysbøye langs kysten og i innlandet, flytende' ],
		'276' => [ 'name' => 'Båke (seilingsmerke)', 'description' => 'Offisiell og privat båke langs kysten og i innlandet, fast' ],
		'277' => [ 'name' => 'Overett (seilingsmerker)', 'description' => 'Offisiell og privat. To stenger med eller uten lys overett, langs kysten og i innlandet, faste' ],
		'278' => [ 'name' => 'Rasteplass', 'description' => 'Rasteplass definert og lagt til rette av Statens vegvesen eller annen offentlig myndighet.' ],
		'280' => [ 'name' => 'Gard', 'description' => 'Gardsnavn; felles navn for et helt gardsnummer (jf. § 8 i lov om stadnamn), og som ett eller flere bruksnummer er knyttet til. Punktet/koordinaten ligger normalt i tunet på et sentralt plassert bruk. Hvis to eller flere garder har forskjellige gardsnummer, men samme navn, registreres det ett geografisk objekt for hvert gardsnummer. (Se også navnetype Navnegard 305 og Bruk 108 .)' ],
		'281' => [ 'name' => 'Ras i sjø', 'description' => 'Undersjøisk rasområde med stein, jord, sand eller leire' ],
		'282' => [ 'name' => 'Gass/Oljefelt i sjø', 'description' => 'Gassfelt og oljefelt i havet. Kun feltnavnet, ikke navnet på olje- eller gassinstallasjonen. (Se også Oljeinstallasjon (Sjø) 197)' ],
		'283' => [ 'name' => 'Vulkan i sjø', 'description' => 'Undersjøisk vulkan, også slamvulkan' ],
		'285' => [ 'name' => 'Platå i sjø', 'description' => 'Undersjøisk havbunnsformasjon; fjell som er flatt på toppen, flat høyde, flat forhøyning; terrasse' ],
		'286' => [ 'name' => 'Rev i sjø', 'description' => 'Undersjøisk, langstrakt havbunnsformasjon, helst i grunnere område' ],
		'287' => [ 'name' => 'Ra i sjø', 'description' => 'Undersjøisk rygg med moreneavsetning' ],
		'288' => [ 'name' => 'Basseng i sjø', 'description' => 'Vid, undersjøisk dal' ],
		'289' => [ 'name' => 'Kontinentalsokkel', 'description' => 'Havbunnen og undergrunnen i de områdene som grenser til en annen stats landterritorium' ],
		'290' => [ 'name' => 'Undersjøisk vegg i sjø', 'description' => 'Fjellside i havet' ],
		'291' => [ 'name' => 'Avleiringsområde i sjø', 'description' => 'Sand-, mudderbanke o.l.' ],
		'292' => [ 'name' => 'Bakketopp i sjø', 'description' => 'Undersjøisk knaus, knoll, kolle, haug' ],
		'293' => [ 'name' => 'Hylle i sjø', 'description' => 'Undersjøisk benk, klippeavsats, kant, framspring, avsats' ],
		'294' => [ 'name' => 'Fjell i sjø', 'description' => 'Undersjøisk fjelltopp, tind, spir' ],
		'295' => [ 'name' => 'Fjellkjede i sjø', 'description' => 'Lengre, sammenhengende undersjøisk fjellformasjon' ],
		'296' => [ 'name' => 'Sadel i sjø', 'description' => 'Undersjøisk skar mellom to høyere topper/rygger' ],
		'297' => [ 'name' => 'Sokkel i sjø', 'description' => 'Undersjøisk ”fjellfot”' ],
		'298' => [ 'name' => 'Sjødetalj', 'description' => 'Alle typer. Skriv forklaring i merknadsfeltet.' ],
		'299' => [ 'name' => 'Geologisk struktur', 'description' => 'Geologisk formasjon under jordoverflaten, både på land og i havet' ],
		'300' => [ 'name' => 'Korallrev i sjø', 'description' => 'Alle typer korallrev i alle dybder' ],
		'301' => [ 'name' => 'Adressetilleggsnavn', 'description' => 'Et stedsnavn som er en del av den offisielle (veg-)adressen, jf. § 54 i matrikkelforskriften; vanligvis bruksnavn (108) eller sjeldnere bygnings- /institusjonsnavn' ],
		'302' => [ 'name' => 'Matrikkeladressenavn', 'description' => 'Et stedsnavn som inngår i den offisielle adressen ved matrikkeladresser, jf. § 52 tredje ledd i matrikkelforskriften.' ],
		'303' => [ 'name' => 'Skolekrets', 'description' => 'Skolekrets definert av kommunen' ],
		'304' => [ 'name' => 'Valgkrets', 'description' => 'Valgkrets definert av kommunen' ],
		'305' => [ 'name' => 'Navnegard', 'description' => 'Opprinnelig gardsnavn fra før garden ble oppdelt i gards- og bruksenheter. Navnegard brukes om to eller flere gardsnummer, og gardsnumrene oppgis i merknadsfeltet. Objektet representeres med ett punkt / én koordinat plassert i tunet til ett sentralt bruk. Dette er hovedpunktet for navneobjektet (navneenheten). Arealet for navnegarden vises med et punkt/koordinat på to eller flere bruk i utkanten av området som viser utbredelsen av navnet.' ],
		'306' => [ 'name' => 'Elvesving', 'description' => 'Naturlig sving (retningsskifte) i elv eller bekk' ],
		'307' => [ 'name' => 'Iskuppel', 'description' => 'En symmetrisk konveks ismasse, ofte av betydelig tykkelse i senter av en større isbre eller innlandsis.' ],
		'308' => [ 'name' => 'Havstrøm', 'description' => 'Kontinuerlig bevegelse av saltvann basert på klimatiske forhold eller tidevann f.eks Golfstrømmen, Saltstraumen, Nappstraumen.' ],
		'309' => [ 'name' => 'Forskningsstasjon', 'description' => 'Meteorologisk stasjon eller forskningsstasjon med bygningsmasse i polare områder som Jan Mayen, Hopen, Zeppelin eller Hornsund.' ],
		'310' => [ 'name' => 'Historisk bosetting', 'description' => 'En eller flere ubebodde/forlatte bygninger av en større bygningsmasse/bosetting, særlig aktuelt for Svalbard og andre polare områder. Kan være både stående bygninger og ruiner. F.eks Pyramiden og Grumantbyen (Svalbard).' ],
		'311' => [ 'name' => 'Skogholt', 'description' => 'Mindre samling av trær; lund; skogkrull.' ],
		'312' => [ 'name' => 'Vegsving (veg/gate)', 'description' => 'Markert eller allment kjent sving på offentlig og privat veg/gate, også mer lokale navn, f.eks. Styggdalssvingen.' ],
		'313' => [ 'name' => 'Bakke (veg/gate)', 'description' => 'Bratt vegstrekning på offentlig/privat veg som har navn, også lokale bakkenavn, f.eks. Slottsbakken, Møllebakken; Eggemobakkene.' ],
		'314' => [ 'name' => 'Krater', 'description' => 'Vanligvis en skål- eller traktformet senkning i jordoverflaten, forårsaket av vulkansk aktivitet. Brukes kun på ”døde” og aktive vulkaner i polare strøk.' ],
	];

}
