plugin.tx_dynamicmap_pi1;
{
    view;
    {
        templateRootPaths;
        .0 = EXT;
        dynamic_map / Resources / Private / Templates /
            templateRootPaths;
        .1 = { $plugin: .tx_dynamicmap_pi1.view.templateRootPath };
        partialRootPaths;
        .0 = EXT;
        dynamic_map / Resources / Private / Partials /
            partialRootPaths;
        .1 = { $plugin: .tx_dynamicmap_pi1.view.partialRootPath };
        layoutRootPaths;
        .0 = EXT;
        dynamic_map / Resources / Private / Layouts /
            layoutRootPaths;
        .1 = { $plugin: .tx_dynamicmap_pi1.view.layoutRootPath };
    }
    persistence;
    {
        storagePid = { $plugin: .tx_dynamicmap_pi1.persistence.storagePid };
        recursive = 1;
    }
    features;
    {
        skipDefaultArguments = 1;
    }
    mvc;
    {
        callDefaultActionIfActionCantBeResolved = 1;
    }
}
lib.math = TEXT;
lib.math;
{
    current = 1;
    prioriCalc = 1;
}
page.includeCSS;
{
    1 = EXT;
    dynamic_map / Resources / Public / CSS / dynamic_map.css;
}
page.includeJSFooterlibs;
{
    1 = EXT;
    dynamic_map / Resources / Public / JavaScript / lightbox - content.js;
}
plugin.tx_dynamicmap._CSS_DEFAULT_STYLE(textarea.f3 - form - error, {
    background: -color, FF9F9F: ,
    border: 1, px: , FF0000: solid
}, input.f3 - form - error, {
    background: -color, FF9F9F: ,
    border: 1, px: , FF0000: solid
}
    .tx - dynamic - map, table, {
    border: -collapse, separate: ,
    border: -spacing, 10: px
}
    .tx - dynamic - map, table, th, {
    font: -weight, bold: 
}
    .tx - dynamic - map, table, td, {
    vertical: -align, top: 
}
    .typo3 - messages.message - error, {
    color: red
}
    .typo3 - messages.message - ok, {
    color: green
});
Module;
configuration;
module.tx_dynamicmap_web_dynamicmappi2;
{
    persistence;
    {
        storagePid = { $module: .tx_dynamicmap_pi2.persistence.storagePid };
    }
    view;
    {
        templateRootPaths;
        .0 = EXT;
        dynamic_map / Resources / Private / Backend / Templates /
            templateRootPaths;
        .1 = { $module: .tx_dynamicmap_pi2.view.templateRootPath };
        partialRootPaths;
        .0 = EXT;
        dynamic_map / Resources / Private / Backend / Partials /
            partialRootPaths;
        .1 = { $module: .tx_dynamicmap_pi2.view.partialRootPath };
        layoutRootPaths;
        .0 = EXT;
        dynamic_map / Resources / Private / Backend / Layouts /
            layoutRootPaths;
        .1 = { $module: .tx_dynamicmap_pi2.view.layoutRootPath };
    }
}
