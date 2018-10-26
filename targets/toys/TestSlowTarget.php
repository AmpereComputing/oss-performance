<?hh
/*
 *  Copyright (c) 2019-present, Facebook, Inc.
 *  All rights reserved.
 *
 *  This source code is licensed under the MIT license found in the
 *  LICENSE file in the root directory of this source tree.
 *
 */

final class TestSlowTarget extends PerfTarget {
  public function getSanityCheckPath(): string {
    return '/slow/tparam_trailing_comma.php';
  }

  public function getSanityCheckString(): string {
    return 'int(4)';
  }
  public function getSourceRoot(): string {
    return __DIR__;
  }
}
