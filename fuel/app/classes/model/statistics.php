<?php
namespace Model;

class Statistics extends \Model 
{
    public static function get_plr_season($id = null) {
            $seaquery = \DB::select('*')->from('player_season_stats');
                if (is_null($id)) { } 
                else { $seaquery->where('person_id', '=', $id); }
                    $seaquery->select([\DB::expr("(MIN/GP)"), 'MPG'])
                    ->select([\DB::expr("(FGM/FGA)"), 'FGP'])
                    ->select([\DB::expr("(TPM/TPA)"), 'TPP'])
                    ->select([\DB::expr("(FTM/FTA)"), 'FTP'])
                    ->select([\DB::expr("(RB/GP)"), 'RBG'])
                    ->select([\DB::expr("(AST/GP)"), 'ASG'])
                    ->select([\DB::expr("(TRN/GP)"), 'TOG'])
                    ->select([\DB::expr("(AST/TRN)"), 'ATT'])
                    ->select([\DB::expr("(PF/GP)"), 'PFG'])
                    ->select([\DB::expr("(BLK/GP)"), 'BLG'])
                    ->select([\DB::expr("(STL/GP)"), 'STG'])
                    ->select([\DB::expr("(PTS/GP)"), 'PPG'])
                    ->select([\DB::expr("(PTS/MIN)"), 'PPM'])
                    ->select([\DB::expr("(FGM/GP)"), 'FGMG'])
                    ->select([\DB::expr("(FGA/GP)"), 'FGAG'])
                    ->select([\DB::expr("(FTM/GP)"), 'FTMG'])
                    ->select([\DB::expr("(FTA/GP)"), 'FTAG'])
                    ->select([\DB::expr("(TPA/GP)"), 'TPAG'])
                    ->select([\DB::expr("(TPM/GP)"), 'TPMG'])
                    ->select([\DB::expr("(ORB/GP)"), 'ORBG'])
                    ->select([\DB::expr("(DRB/GP)"), 'DRBG']);

            $season = $seaquery->as_object()->execute(); 
            return $season;
    }
    public static function get_plr_career($id = null) {
        $query = \DB::select('*')->from('player_season_stats');
                if (is_null($id)) { } 
                else { $query->where('person_id', '=', $id); }
                    $query->select([\DB::expr("SUM(GP)"), 'GP'])
                    ->select([\DB::expr("SUM(FGM)"), 'FGM'])
                    ->select([\DB::expr("SUM(FGA)"), 'FGA'])
                    ->select([\DB::expr("SUM(TPA)"), 'TPA'])
                    ->select([\DB::expr("SUM(TPM)"), 'TPM'])
                    ->select([\DB::expr("SUM(FTM)"), 'FTM'])
                    ->select([\DB::expr("SUM(FTA)"), 'FTA'])
                    ->select([\DB::expr("SUM(ORB)"), 'ORB'])
                    ->select([\DB::expr("SUM(DRB)"), 'DRB'])
                    ->select([\DB::expr("SUM(RB)"), 'RB'])
                    ->select([\DB::expr("SUM(PF)"), 'PF'])
                    ->select([\DB::expr("SUM(BLK)"), 'BLK'])
                    ->select([\DB::expr("SUM(STL)"), 'STL'])
                    ->select([\DB::expr("SUM(AST)"), 'AST'])
                    ->select([\DB::expr("SUM(TRN)"), 'TRN'])
                    ->select([\DB::expr("SUM(BLK)"), 'BLK'])
                    ->select([\DB::expr("SUM(PTS)"), 'PTS'])
                    ->select([\DB::expr("SUM(GS)"), 'GS'])
                    ->select([\DB::expr("SUM(MIN)"), 'MIN'])
                    ->select([\DB::expr("(SUM(FGM)/SUM(FGA))"), 'FGP'])
                    ->select([\DB::expr("(SUM(TPM)/SUM(TPA))"), 'TPP'])
                    ->select([\DB::expr("(SUM(FTM)/SUM(FTA))"), 'FTP'])
                    ->select([\DB::expr("(SUM(AST)/SUM(TRN))"), 'ATT'])
                    ->group_by('person_id');
                    
            $career = $query->as_object()->execute(); 
            return $career;
        }
}
