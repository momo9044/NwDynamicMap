<?php


namespace NW\DynamicMap\Controller;
class FileUpload extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * Function to upload file and create file reference
     *
     * @var array $fileData
     * @var mixed $obj foreing model object
     *
     * @return void
     */
    public function uploadAndCreateFileReference($property, $fileData, $obj, $field,$tablenames)
    {
        $storageUid = 1;
        $resourceFactory = \TYPO3\CMS\Core\Resource\ResourceFactory::getInstance();
        $folder = 'user_uploads/fahrer/';
        //Adding file to storage

        $storageRepository = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Core\\Resource\\StorageRepository');

        $storage = $storageRepository->findByUid(1);
        $targetFolder = null;
        if ($storage->hasFolder($folder)) {
            $targetFolder = $storage->getFolder($folder);
        } else {
            $targetFolder = $storage->createFolder($folder);
        }
        $originalFilePath = $fileData['tmp_name'][$property];
        $newFileName = $fileData['name'][$property];

        //var_dump($storage);
        if (!is_object($storage)) {
            $storage = $resourceFactory->getDefaultStorage();
        }
        if(file_exists($originalFilePath)){
            $file = $storage->addFile(
                $originalFilePath,
                $targetFolder,
                $newFileName
            );
        }

        // Assemble DataHandler data
        $newId = 'NEW1234';
        $data = array();
        $data['sys_file_reference'][$newId] = array(
            'table_local' => 'sys_file',
            'uid_local' => $file->getUid(),
            'tablenames' => $tablenames,
            'uid_foreign' => $obj->getUid(),
            'fieldname' => $field,
            'pid' => $obj->getPid()
        );
        $data[$tablenames][$obj->getUid()] = array(
            $field => $newId
        );
        // Get an instance of the DataHandler and process the data
        /** @var DataHandler $dataHandler */
        $dataHandler = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Core\\DataHandling\\DataHandler');
        $dataHandler->start($data, array());
        $dataHandler->process_datamap();
        // Error or success reporting
        if (count($dataHandler->errorLog) === 0) {
            // Handle success
        } else {
            // Handle errors
        }
    }
}

?>