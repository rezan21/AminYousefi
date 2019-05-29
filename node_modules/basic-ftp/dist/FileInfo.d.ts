export declare enum FileType {
    Unknown = 0,
    File = 1,
    Directory = 2,
    SymbolicLink = 3
}
export interface FilePermissions {
    readonly user: number;
    readonly group: number;
    readonly world: number;
}
export declare class FileInfo {
    static Permission: {
        Read: number;
        Write: number;
        Execute: number;
    };
    name: string;
    type: FileType;
    size: number;
    permissions: FilePermissions;
    hardLinkCount: number;
    link: string;
    group: string;
    user: string;
    date: string;
    constructor(name: string);
    readonly isDirectory: boolean;
    readonly isSymbolicLink: boolean;
    readonly isFile: boolean;
}
