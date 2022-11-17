<?php

declare(strict_types=1);

namespace NetbrothersGmbh\AuftragsdateiParser\Service;

use Exception;
use NetbrothersGmbh\AuftragsdateiParser\Model\ParseResult;

/**
 * Project: auftragsdatei-parser
 * 
 * @author Thilo Ratnaweera <info@netbrothers.de>
 * @copyright © 2022 NetBrothers GmbH.
 * @license GPLv3
 */
final class Parser
{
    public function parse(string $content): ParseResult
    {
        if (strlen($content) !== 348) {
            throw new Exception('Invalid file length');
        }
        return new ParseResult(
            substr($content, 0, 6),     // IDENTIFIKATOR
            substr($content, 6, 2),     // VERSION
            substr($content, 8, 8),     // LAENGE_AUFTRAG
            substr($content, 16, 3),    // SEQUENZ_NR
            substr($content, 19, 5),    // VERFAHREN_KENNUNG
            substr($content, 24, 3),    // TRANSFER_NUMMER
            substr($content, 27, 5),    // VERFAHREN_KENNUNG_SPEZIFIKATION
            substr($content, 32, 15),   // ABSENDER_EIGNER
            substr($content, 47, 15),   // ABSENDER_PHYSIKALISCH
            substr($content, 62, 15),   // EMPFAENGER_NUTZER
            substr($content, 77, 15),   // EMPFAENGER_PHYSIKALISCH
            substr($content, 92, 6),    // FEHLER_NUMMER
            substr($content, 98, 6),    // FEHLER_MASSNAHME
            substr($content, 104, 11),  // DATEINAME
            substr($content, 115, 14),  // DATUM_ERSTELLUNG
            substr($content, 129, 14),  // DATUM_UEBERTRAGUNG_GESENDET
            substr($content, 143, 14),  // DATUM_UEBERTRAGUNG_EMPFANGEN_START
            substr($content, 157, 14),  // DATUM_UEBERTRAGUNG_EMPFANGEN_ENDE
            substr($content, 171, 6),   // DATEIVERSION
            substr($content, 177, 1),   // KORREKTUR
            substr($content, 178, 12),  // DATEIGROESSE_NUTZDATEN
            substr($content, 190, 12),  // DATEIGROESSE_UEBERTRAGUNG
            substr($content, 202, 2),   // ZEICHENSATZ
            substr($content, 204, 2),   // KOMPRIMIERUNG
            substr($content, 206, 2),   // VERSCHLUESSELUNGSART
            substr($content, 208, 2),   // ELEKTRONISCHE_UNTERSCHRIFT
            substr($content, 210, 3),   // SATZFORMAT
            substr($content, 213, 5),   // SATZLAENGE
            substr($content, 218, 8),   // BLOCKLAENGE
            substr($content, 226, 1),   // STATUS
            substr($content, 227, 2),   // WIEDERHOLUNG
            substr($content, 229, 1),   // UEBERTRAGUNGSWEG
            substr($content, 230, 10),  // VERZOEGERTERVERSAND
            substr($content, 240, 6),   // INFOUNDFEHLERFELDER
            substr($content, 246, 28),  // VARIABLESINFOFELD
            substr($content, 274, 44),  // EMAILADRESSEABSENDER
            substr($content, 318, 30),  // DATEI_BEZEICHNUNG
        );
    }
}
