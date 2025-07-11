<?php
if (!function_exists('getLogoPath')) {
    function getLogoPath($nomeSquadra, $conn) {
        if(empty($nomeSquadra)) return '';
        
        $query = "SELECT immagini_loghi FROM squadre WHERE Nome = ? LIMIT 1";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $nomeSquadra);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return './immagini/' . $row['immagini_loghi'];
        }
        return '';
    }
}

if (!function_exists('displaySquadraWithLogo')) {
    function displaySquadraWithLogo($nomeSquadra, $conn) {
        $logoPath = getLogoPath($nomeSquadra, $conn);
        
        $output = '';
        if (!empty($logoPath)) {
            $output .= '<img src="'.$logoPath.'" class="squadra-logo" alt="'.$nomeSquadra.'">';
        }
        $output .= '<span class="squadra-nome">'.$nomeSquadra.'</span>';
        
        return $output;
    }
}
?>