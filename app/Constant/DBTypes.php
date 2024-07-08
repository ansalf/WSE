<?php

namespace App\Constant;

class DBTypes
{
    const UserGender = 'userjk';
    const UserGenderM = 'laki-laki';
    const UserGenderF = 'perempuan';

    const UserRole = 'userrole';
    const RoleSuperAdmin = 'superadmin';
    const RoleAdmin = 'admin';
    const RoleAnggota = 'anggota';

    const FileTypes = 'fileTypes';
    const FileTypePic = 'fileTypePic';
    const FileDemisPic = 'fileDemisPic';
    const FileProfilePic = 'fileProfPic';
    const FileNewsThumb = 'fileNewsThumb';

    const NewsCategory = 'newsCategory';
    const NewsCategoryIT = 'newsIT';
    const NewsCategoryPC = 'newsPC';
    const NewsCategoryRo = 'newsRo';
    const NewsCategoryPr = 'newsPr';

    const NewsStatus = 'newsStatus';
    const NewsDraft = 'draft';
    const NewsPublished = 'published';
    const NewsArchived = 'archived';
}
