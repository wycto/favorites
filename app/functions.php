<?php
/**
 * Here is your custom functions.
 */
function arrayToTree($DataArr, $DataKey='id', $DataParentKey = 'pid', $ChildrenKey = 'children') {

    $Refs = array();
    foreach ($DataArr as $Offset => $Row) {
        $DataArr[$Offset][$ChildrenKey] = array();
        $Refs[$Row[$DataKey]] = &$DataArr[$Offset];
    }

    $Tree = array();
    foreach ($DataArr as $key => $Row) {
        $parent_id = $Row[$DataParentKey];
        if (!isset($Refs[$parent_id])) {
            $Tree[] = &$DataArr[$key];
            continue;
        }
        $Refs[$parent_id][$ChildrenKey][] = &$DataArr[$key];
    }

    return $Tree;
}