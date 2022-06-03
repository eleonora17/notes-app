<?php
// carica il codice della classe JSONDB e della classe Note
require_once("JSONDB.php");
require_once("json.php");
require_once("dataTypes.php");

//require("smart_tv.php");

// specifica di usare la classe JSONDB presente nello namespace Jajo
use \Jajo\JSONDB;


class NoteRepository {
    private static string $directoryDB = __DIR__;
    private static string $tableName = 'notes';
    private static string $fileName = 'notes.json';

    /**
     * Restituisce un array di tutte le istanze di Note presenti nel database
     * @return array Array delle istanze individuate
     */
    public static function estrai_tutti(): array {
        $arrayNote = [];
        try {
            // crea una istanza di database che fa rifeirmento alla directory specificata
            $db = new JSONDB(self::$directoryDB);
            // estrae tutte tutti gli elementi dal database con nome file smart_tvs.json
            $arrayDB = $db->select( '*' )
            	->from( self::$fileName )
                ->get();
            // scandisce tutto l'array ricavato con la query, istanzia le Note, aggiunge all'array dei risultati
            foreach ($arrayDB as $objDB) {
                $objNote = new Note(
                    $objDB["titolo"],
                    $objDB["contenuto"],
                    $objDB["id"],
                    $objDB["dataCreazione"],
                );
                // ultimo volume memorizzato (attributo di stato)
                //$objNote->volume = $objDB["volume"];
                // aggiunge l'istanza di Note all'array
                $arrayNote[] = $objNote;
            }
        } catch (\Throwable $th) {
            throw $th;
        }
        return $arrayNote;
    }


    /**
     * Restituisce un'istanza di Note con il numero seriale specificato
     * @param string $numeroSeriale Numero seriale per cui cercare
     * @return null|Note Istanza di Note individuata oppure null se non trovata
     */
    public static function estrai(string $id): ?Note {
        $objNote = null;
        try {
            // crea una istanza di database che fa rifeirmento alla directory specificata
            $db = new JSONDB(self::$directoryDB);
            // estrae tutte tutti gli elementi dal database con nome file smart_tvs.json
            $arrayDB = $db->select( '*' )
            	->from( self::$fileName )
                ->where( [ 'id' => $id ] )
                ->get();
            // ci deve essere un unico risultato
            foreach ($arrayDB as $objDB) {
                $objNote = new Note(
                    $objDB["titolo"],
                    $objDB["contenuto"],
                    $objDB["id"],
                    $objDB["dataCreazione"],
                );
                // ultimo volume memorizzato (attributo di stato)
                //$objNote->volume = $objDB["volume"];
            }
        } catch (\Throwable $th) {
            // throw $th;
        }
        return $objNote;
    }


    /**
     * Inserisce nel DB l'istanza di Note specificata
     * @param Note $objNote Istanza da inserire
     * @return bool Risultato dell'operazione: true = successo, false = fallimento
     */
    public static function inserisci(Note $objNote): bool {
        $operazioneRiuscita = false;
        try {
            // crea un database che sarà memorizzato nella stessa directory di questo file (modificare per altra cartella)
            $db = new JSONDB(self::$directoryDB);
            // crea il file smart_tvs.json se non esiste ed inserisce un oggetto con i dati specificati
            $db->insert( 
                self::$tableName, 
                [
                    'titolo' => $objNote->getTitolo(), //devo usare i getter perché gli attributi sono privati
                    'contenuto' => $objNote->getContenuto(),
                    'id' => $objNote->getId(),
                    'dataCreazione' => $objNote->getDataCreazione(),
                ]
            );
            $operazioneRiuscita = true;
        } catch (\Throwable $th) {
            // throw $th;
        }
        return $operazioneRiuscita;
    }


    /**
     * Aggiorna nel DB l'istanza di Note specificata
     * @param Note $objNote Istanza da aggiornare
     * @return bool Risultato dell'operazione: true = successo, false = fallimento
     */
    public static function aggiorna(Note $objNote): bool {
        $operazioneRiuscita = false;
        try {
            // crea un database che sarà memorizzato nella stessa directory di questo file (modificare per altra cartella)
            $db = new JSONDB(self::$directoryDB);
            // crea il file smart_tvs.json se non esiste ed inserisce un oggetto con i dati specificati
            $db->update( [ 
                'titolo' => $objNote->getTitolo(),
                'contenuto' => $objNote->getContenuto(),
                // IPOTESI: NUMERO SERIALE IMMUTABILE  'id' => $objNote->id,
                'dataCreazione' => $objNote->getDataCreazione(),
            ] )
            ->from( self::$fileName )
            ->where( [ 'id' => $objNote->getId() ] )
            ->trigger();
            $operazioneRiuscita = true;
        } catch (\Throwable $th) {
            throw $th;
        }
        return $operazioneRiuscita;
    }



    /**
     * Elimina dal DB l'istanza di Note con il numero serale specificato
     * @param string $numeroSeriale Numero seriale della istanza da eliminare
     * @return bool Risultato dell'operazione: true = successo, false = fallimento
     */
    public static function elimina(string $numeroSeriale): bool {
        $operazioneRiuscita = false;
        try {
            // crea un database che sarà memorizzato nella stessa directory di questo file (modificare per altra cartella)
            $db = new JSONDB(self::$directoryDB);
            // crea il file smart_tvs.json se non esiste ed inserisce un oggetto con i dati specificati
            $db->delete()
                ->from( self::$fileName )
                ->where( [ 'id' => $numeroSeriale ] )
                ->trigger();
            $operazioneRiuscita = true;
        } catch (\Throwable $th) {
            // throw $th;
        }
        return $operazioneRiuscita;
    }
}
?>