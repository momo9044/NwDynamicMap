
plugin.tx_dynamicmap_pi1 {
  view {
    # cat=plugin.tx_dynamicmap_pi1/file; type=string; label=Path to template root (FE)
    templateRootPath = EXT:dynamic_map/Resources/Private/Templates/
    # cat=plugin.tx_dynamicmap_pi1/file; type=string; label=Path to template partials (FE)
    partialRootPath = EXT:dynamic_map/Resources/Private/Partials/
    # cat=plugin.tx_dynamicmap_pi1/file; type=string; label=Path to template layouts (FE)
    layoutRootPath = EXT:dynamic_map/Resources/Private/Layouts/
  }
  persistence {
    # cat=plugin.tx_dynamicmap_pi1//a; type=string; label=Default storage PID
    storagePid =
  }
}

module.tx_dynamicmap_pi2 {
  view {
    # cat=module.tx_dynamicmap_pi2/file; type=string; label=Path to template root (BE)
    templateRootPath = EXT:dynamic_map/Resources/Private/Backend/Templates/
    # cat=module.tx_dynamicmap_pi2/file; type=string; label=Path to template partials (BE)
    partialRootPath = EXT:dynamic_map/Resources/Private/Backend/Partials/
    # cat=module.tx_dynamicmap_pi2/file; type=string; label=Path to template layouts (BE)
    layoutRootPath = EXT:dynamic_map/Resources/Private/Backend/Layouts/
  }
  persistence {
    # cat=module.tx_dynamicmap_pi2//a; type=string; label=Default storage PID
    storagePid =
  }
}
