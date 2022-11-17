<?php

declare(strict_types=1);

namespace NetbrothersGmbh\AuftragsdateiParser\Model;

/**
 * Project: auftragsdatei-parser
 * 
 * @author Thilo Ratnaweera <info@netbrothers.de>
 * @copyright © 2022 NetBrothers GmbH.
 * @license GPLv3
 */
final class ParseResult
{
    public function __construct(
        public readonly string $IDENTIFIKATOR,
        public readonly string $VERSION,
        public readonly string $LAENGE_AUFTRAG,
        public readonly string $SEQUENZ_NR,
        public readonly string $VERFAHREN_KENNUNG,
        public readonly string $TRANSFER_NUMMER,
        public readonly string $VERFAHREN_KENNUNG_SPEZIFIKATION,
        public readonly string $ABSENDER_EIGNER,
        public readonly string $ABSENDER_PHYSIKALISCH,
        public readonly string $EMPFAENGER_NUTZER,
        public readonly string $EMPFAENGER_PHYSIKALISCH,
        public readonly string $FEHLER_NUMMER,
        public readonly string $FEHLER_MASSNAHME,
        public readonly string $DATEINAME,
        public readonly string $DATUM_ERSTELLUNG,
        public readonly string $DATUM_UEBERTRAGUNG_GESENDET,
        public readonly string $DATUM_UEBERTRAGUNG_EMPFANGEN_START,
        public readonly string $DATUM_UEBERTRAGUNG_EMPFANGEN_ENDE,
        public readonly string $DATEIVERSION,
        public readonly string $KORREKTUR,
        public readonly string $DATEIGROESSE_NUTZDATEN,
        public readonly string $DATEIGROESSE_UEBERTRAGUNG,
        public readonly string $ZEICHENSATZ,
        public readonly string $KOMPRIMIERUNG,
        public readonly string $VERSCHLUESSELUNGSART,
        public readonly string $ELEKTRONISCHE_UNTERSCHRIFT,
        public readonly string $SATZFORMAT,
        public readonly string $SATZLAENGE,
        public readonly string $BLOCKLAENGE,
        public readonly string $STATUS,
        public readonly string $WIEDERHOLUNG,
        public readonly string $UEBERTRAGUNGSWEG,
        public readonly string $VERZOEGERTERVERSAND,
        public readonly string $INFOUNDFEHLERFELDER,
        public readonly string $VARIABLESINFOFELD,
        public readonly string $EMAILADRESSEABSENDER,
        public readonly string $DATEI_BEZEICHNUNG,
    ) {
    }

    public function toArray(): array
    {
        return [
            'IDENTIFIKATOR' => $this->IDENTIFIKATOR,
            'VERSION' => $this->VERSION,
            'LAENGE_AUFTRAG' => $this->LAENGE_AUFTRAG,
            'SEQUENZ_NR' => $this->SEQUENZ_NR,
            'VERFAHREN_KENNUNG' => $this->VERFAHREN_KENNUNG,
            'TRANSFER_NUMMER' => $this->TRANSFER_NUMMER,
            'VERFAHREN_KENNUNG_SPEZIFIKATION' => $this->VERFAHREN_KENNUNG_SPEZIFIKATION,
            'ABSENDER_EIGNER' => $this->ABSENDER_EIGNER,
            'ABSENDER_PHYSIKALISCH' => $this->ABSENDER_PHYSIKALISCH,
            'EMPFAENGER_NUTZER' => $this->EMPFAENGER_NUTZER,
            'EMPFAENGER_PHYSIKALISCH' => $this->EMPFAENGER_PHYSIKALISCH,
            'FEHLER_NUMMER' => $this->FEHLER_NUMMER,
            'FEHLER_MASSNAHME' => $this->FEHLER_MASSNAHME,
            'DATEINAME' => $this->DATEINAME,
            'DATUM_ERSTELLUNG' => $this->DATUM_ERSTELLUNG,
            'DATUM_UEBERTRAGUNG_GESENDET' => $this->DATUM_UEBERTRAGUNG_GESENDET,
            'DATUM_UEBERTRAGUNG_EMPFANGEN_START' => $this->DATUM_UEBERTRAGUNG_EMPFANGEN_START,
            'DATUM_UEBERTRAGUNG_EMPFANGEN_ENDE' => $this->DATUM_UEBERTRAGUNG_EMPFANGEN_ENDE,
            'DATEIVERSION' => $this->DATEIVERSION,
            'KORREKTUR' => $this->KORREKTUR,
            'DATEIGROESSE_NUTZDATEN' => $this->DATEIGROESSE_NUTZDATEN,
            'DATEIGROESSE_UEBERTRAGUNG' => $this->DATEIGROESSE_UEBERTRAGUNG,
            'ZEICHENSATZ' => $this->ZEICHENSATZ,
            'KOMPRIMIERUNG' => $this->KOMPRIMIERUNG,
            'VERSCHLUESSELUNGSART' => $this->VERSCHLUESSELUNGSART,
            'ELEKTRONISCHE_UNTERSCHRIFT' => $this->ELEKTRONISCHE_UNTERSCHRIFT,
            'SATZFORMAT' => $this->SATZFORMAT,
            'SATZLAENGE' => $this->SATZLAENGE,
            'BLOCKLAENGE' => $this->BLOCKLAENGE,
            'STATUS' => $this->STATUS,
            'WIEDERHOLUNG' => $this->WIEDERHOLUNG,
            'UEBERTRAGUNGSWEG' => $this->UEBERTRAGUNGSWEG,
            'VERZOEGERTERVERSAND' => $this->VERZOEGERTERVERSAND,
            'INFOUNDFEHLERFELDER' => $this->INFOUNDFEHLERFELDER,
            'VARIABLESINFOFELD' => $this->VARIABLESINFOFELD,
            'EMAILADRESSEABSENDER' => $this->EMAILADRESSEABSENDER,
            'DATEI_BEZEICHNUNG' => $this->DATEI_BEZEICHNUNG,
        ];
    }

    public function toTableArray(): array
    {
        $table = [];
        foreach ($this->toArray() as $key => $value) {
            $table[] = [$key, $value];
        }
        return $table;
    }
}
